<?php
namespace Application\Query\Provider\StatusCode;

use ZF\Rest\ResourceEvent;
use ZF\Apigility\Doctrine\Server\Query\Provider\AbstractQueryProvider;
use Doctrine\ORM\QueryBuilder;

class FetchAll extends AbstractQueryProvider
{
    /**
     * @param ResourceEvent $event
     * @param string $entityClass
     * @param array $parameters
     * @return QueryBuilder
     */
    public function createQuery(ResourceEvent $event, $entityClass, $parameters)
    {
        /**
         * 
         * @var QueryBuilder $queryBuilder
         */
        $queryBuilder = $this->getObjectManager()->createQueryBuilder();
        $queryBuilder
            ->select('row')
            ->from($entityClass, 'row');
        
//         if (count($parameters) > 0) {
//             $queryParams = [];
//             foreach ($parameters as $k => $v) {
//                 $queryParams[] = $k . ' = ' .  ':' . $k;
//             }
            
//             $query = implode(' AND ', $queryParams);
//             $queryBuilder->where($query);
//         }
        
//         if (count($parameters) > 0) {
//             foreach ($parameters as $k => $v) {
//                 $queryBuilder->setParameter($k, $v);
//             }
//         }

        if (count($parameters) > 0) {
            if (isset($parameters['tableName'])) {
                $queryBuilder->where('row.tableName = :tablename');
                $queryBuilder->setParameter('tablename', $parameters['tableName']);
            }
        }
            
        return $queryBuilder;
        
    }
}
