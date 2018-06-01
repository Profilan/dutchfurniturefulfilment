<?php
namespace Application\Query\Resource;

use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource as Resource;
use ZF\ApiProblem\ApiProblem;
use Zend\Mvc\ModuleRouteListener;
use Doctrine\ORM\NoResultException;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;
use ReflectionClass;
use ZF\Rest\RestController;
use Zend\EventManager\EventInterface;
use Doctrine\ORM\NativeQuery;
use DoctrineModule\Paginator\Adapter\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class DoctrineResource extends Resource
{
    /**
     * Fetch all or a subset of resources
     *
     * @param array $data
     * @return ApiProblem|mixed
     */
    public function fetchAll($data = [])
    {
        // Build query
        $queryProvider = $this->getQueryProvider('fetch_all');
        /**
         * 
         * @var NativeQuery $nativeQuery
         */
        $nativeQuery = $queryProvider->createQuery($this->getEvent(), $this->getEntityClass(), $data);
        
        if ($nativeQuery instanceof ApiProblem) {
            return $nativeQuery;
        }
        
        $response = $this->triggerDoctrineEvent(
            DoctrineResourceEvent::EVENT_FETCH_ALL_PRE,
            $this->getEntityClass(),
            $data
            );
        if ($response->last() instanceof ApiProblem) {
            return $response->last();
        }
        
        $items = new ArrayCollection($nativeQuery->getResult());
        
        $reflection = new ReflectionClass($this->getCollectionClass());
        
        $collection = $reflection->newInstance(new Collection($items));
        
        $results = $this->triggerDoctrineEvent(
            DoctrineResourceEvent::EVENT_FETCH_ALL_POST,
            $this->getEntityClass(),
            $data
            );
        if ($results->last() instanceof ApiProblem) {
            return $results->last();
        }
        
        // Add event to set extra HAL data
        $entityClass = $this->getEntityClass();
        
        $this->getSharedEventManager()->attach(
            RestController::class,
            'getList.post',
            function (EventInterface $e) use ($queryProvider, $entityClass, $data) {
                /** @var \ZF\Hal\Collection $halCollection */
                $halCollection = $e->getParam('collection');
                $collection = $halCollection->getCollection();
                
                $collection->setItemCountPerPage($halCollection->getPageSize());
                $collection->setCurrentPageNumber($halCollection->getPage());
                
                $halCollection->setCollectionRouteOptions([
                    'query' => $e->getTarget()->getRequest()->getQuery()->toArray(),
                ]);
            }
            );
        
        return $collection;
    }
    
    /**
     * Gets an entity by route params and/or the specified id
     *
     * @param $id
     * @param $method
     * @param null|array $data parameters
     * @return object
     */
    protected function findEntity($id, $method, $data = [])
    {
        // Match identity identifier name(s) with id(s)
        $ids = explode($this->getMultiKeyDelimiter(), $id);
        $keys = explode($this->getMultiKeyDelimiter(), $this->getEntityIdentifierName());
        $criteria = [];
        
        if (count($ids) !== count($keys)) {
            return new ApiProblem(
                500,
                'Invalid multi identifier count.  '
                . count($ids)
                . ' must equal '
                . count($keys)
                );
        }
        
        foreach ($keys as $index => $identifier) {
            $criteria[$identifier] = $ids[$index];
        }
        
        $classMetaData = $this->getObjectManager()->getClassMetadata($this->getEntityClass());
        $routeMatch = $this->getEvent()->getRouteMatch();
        $associationMappings = $classMetaData->getAssociationNames();
        $fieldNames = $classMetaData->getFieldNames();
        $routeParams = $routeMatch->getParams();
        
        if (array_key_exists($this->getRouteIdentifierName(), $routeParams)) {
            unset($routeParams[$this->getRouteIdentifierName()]);
        }
        
        $reservedRouteParams = [
            'controller',
            'action',
            ModuleRouteListener::MODULE_NAMESPACE,
            ModuleRouteListener::ORIGINAL_CONTROLLER,
        ];
        $allowedRouteParams = array_diff_key($routeParams, array_flip($reservedRouteParams));
        
        /**
         * Append query selection parameters by route match.
         */
        foreach ($allowedRouteParams as $routeMatchParam => $value) {
            if (in_array($routeMatchParam, $associationMappings) || in_array($routeMatchParam, $fieldNames)) {
                $criteria[$routeMatchParam] = $value;
            }
        }
        
        // Build query
        $queryProvider = $this->getQueryProvider($method);
        
//         // Add criteria
//         foreach ($criteria as $key => $value) {
//             $parameterName = 'a' . md5(rand());
//             $queryBuilder->andwhere($queryBuilder->expr()->eq('row.' . $key, ":$parameterName"));
//             $queryBuilder->setParameter($parameterName, $value);
            
//             $nativeQuery->setParameter($key, $value)
//         }
        $data = array_merge($criteria, $data);
        /**
         * 
         * @var NativeQuery $nativeQuery
         */
        $nativeQuery = $queryProvider->createQuery($this->getEvent(), $this->getEntityClass(), $criteria);
        
        if ($nativeQuery instanceof ApiProblem) {
            return $nativeQuery;
        }
        
        try {
            $entity = $nativeQuery->getSingleResult();
        } catch (NoResultException $e) {
            $entity = null;
        }
        
        if (! $entity) {
            $entity = new ApiProblem(404, 'Entity was not found');
        }
        
        return $entity;
    }
    
}
