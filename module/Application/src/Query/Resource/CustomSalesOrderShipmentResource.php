<?php
namespace Application\Query\Resource;

use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource as Resource;
use ZF\ApiProblem\ApiProblem;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;

class CustomSalesOrderShipmentResource extends Resource
{
    /**
     * Create a resource
     *
     * @param mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $entityClass = $this->getEntityClass();
        
        var_dump($data);die();
        
        $data = $this->getQueryCreateFilter()->filter($this->getEvent(), $entityClass, $data);
        if ($data instanceof ApiProblem) {
            return $data;
        }
        
        $entity = new $entityClass;
        
        // Does the data already exists based on the SKU_Id
        $shipments = $this->getObjectManager()->getRepository($entityClass)->findBy(array(
            'SKU_Id' => $data['skuId']
        ));
        
        
        
        $results = $this->triggerDoctrineEvent(DoctrineResourceEvent::EVENT_CREATE_PRE, $entity, $data);
        if ($results->last() instanceof ApiProblem) {
            return $results->last();
        } elseif (! $results->isEmpty() && $results->last() !== null) {
            // TODO Change to a more logical/secure way to see if data was acted and and we have the expected response
            $preEventData = $results->last();
        } else {
            $preEventData = $data;
        }
        
        $hydrator = $this->getHydrator();
        $hydrator->hydrate((array) $preEventData, $entity);
        
        $this->getObjectManager()->persist($entity);
        
        $results = $this->triggerDoctrineEvent(DoctrineResourceEvent::EVENT_CREATE_POST, $entity, $data);
        if ($results->last() instanceof ApiProblem) {
            return $results->last();
        }
        
        $this->getObjectManager()->flush();
        
        return $entity;
    }
    
    /**
     * Update a resource
     *
     * @param mixed $id
     * @param mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $entity = $this->findEntity($id, 'update', $data);
        
        if ($entity instanceof ApiProblem) {
            return $entity;
        }
        
        $results = $this->triggerDoctrineEvent(DoctrineResourceEvent::EVENT_UPDATE_PRE, $entity, $data);
        if ($results->last() instanceof ApiProblem) {
            return $results->last();
        } elseif (! $results->isEmpty() && $results->last() !== null) {
            // TODO Change to a more logical/secure way to see if data was acted on and we have the expected response
            $preEventData = $results->last();
        } else {
            $preEventData = $data;
        }
        
        $this->getHydrator()->hydrate((array) $preEventData, $entity);
        
        $results = $this->triggerDoctrineEvent(DoctrineResourceEvent::EVENT_UPDATE_POST, $entity, $data);
        if ($results->last() instanceof ApiProblem) {
            return $results->last();
        }
        
        $this->getObjectManager()->flush();
        
        return $entity;
    }
    
}
