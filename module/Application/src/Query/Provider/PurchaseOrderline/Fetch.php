<?php
namespace Application\Query\Provider\PurchaseOrderline;

use ZF\Rest\ResourceEvent;
use ZF\Apigility\Doctrine\Server\Query\Provider\AbstractQueryProvider;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\ORM\NativeQuery;

class Fetch extends AbstractQueryProvider
{
    /**
     * @param ResourceEvent $event
     * @param string $entityClass
     * @param array $parameters
     * @return NativeQuery
     */
    public function createQuery(ResourceEvent $event, $entityClass, $parameters)
    {
        $builder = new ResultSetMappingBuilder($this->getObjectManager());
        $builder->addRootEntityFromClassMetadata($entityClass, 'row');
        
        /**
         *
         * @var \Doctrine\ORM\Query\ResultSetMapping $rsm
         */
        $rsm = $builder->addEntityResult($entityClass, 'row');
        
        $query = 'SET NOCOUNT ON;EXEC EEK_sp_DISTRIBUTION_PURCHASEORDERS';
        
        $queryParams = [];
        $queryParams[] = '@type = :type';
        if (count($parameters) > 0) {
            
            foreach ($parameters as $k => $v) {
                $queryParams[] = '@' . strtolower($k) . ' = ' .  ':' . strtolower($k);
            }
            
            $query .= ' ' . implode(',', $queryParams);
        }
        
        /**
         *
         * @var NativeQuery $nativeQuery
         */
        $nativeQuery = $this->getObjectManager()->createNativeQuery(
            $query,
            $rsm
            );
        
        $params = [];
        $params['type'] = "3";
        if (count($parameters) > 0) {
            
            foreach ($parameters as $k => $v) {
                $params[strtolower($k)] = urldecode($v);
            }
            
            $nativeQuery->setParameters($params);
        }
        
        return $nativeQuery;
        
    }
}