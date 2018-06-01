<?php
namespace Feeds\V1\Rest\StockData;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Paginator\Adapter\Collection;
use Doctrine\Common\Collections\ArrayCollection;

class StockDataResource extends AbstractResourceListener
{
    /**
     *
     * @var EntityManager
     */
    var $entityManager;

    /**
     *
     * @param EntityManager $em
     */
    public function __construct(EntityManager $em)
    {
        $this->entityManager = $em;
    }
    
    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        return new ApiProblem(405, 'The POST method has not been defined');
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for individual resources');
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {
        $rsm = new ResultSetMapping();
        
        $rsm->addEntityResult('Feeds\\V1\Rest\StockData\StockDataEntity', 'a');
        $rsm->addFieldResult('a', 'ITEMCODE', 'itemcode'); // ($alias, $columnName, $fieldName)
        $rsm->addFieldResult('a', 'EAN', 'ean');
        $rsm->addFieldResult('a', 'STATUS', 'status');
        $rsm->addFieldResult('a', 'STOCKLEVEL', 'stocklevel');
        $rsm->addFieldResult('a', 'ATP', 'atp');
        $rsm->addFieldResult('a', 'DFF_SHIPMENT', 'dffShipment');
        
        $qb = $this->entityManager->createNativeQuery(
            'SET NOCOUNT ON;EXEC EEK_SP_STOCKFEED ' .
            '@ITEMCODE = :itemcode', 
            $rsm
            );
        $qb->setParameters(
            array(
                'itemcode' => $id,
            ));
        
        $item = $qb->getResult()[0];
        
        return $item;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = [])
    {
        $rsm = new ResultSetMapping();
        $rsm->addEntityResult('Feeds\\V1\\Rest\\StockData\\StockDataEntity', 'a');
        $rsm->addFieldResult('a', 'ITEMCODE', 'itemcode'); // ($alias, $columnName, $fieldName)
        $rsm->addFieldResult('a', 'EAN', 'ean');
        $rsm->addFieldResult('a', 'STATUS', 'status');
        $rsm->addFieldResult('a', 'STOCKLEVEL', 'stocklevel');
        $rsm->addFieldResult('a', 'ATP', 'atp');
        $rsm->addFieldResult('a', 'DFF_SHIPMENT', 'dffShipment');
        
        $query = 'SET NOCOUNT ON;EXEC EEK_SP_STOCKFEED';
        
        if (count($params) > 0) {
            $queryParams = [];
            foreach ($params as $k => $v) {
                $queryParams[] = '@' . strtolower($k) . ' = ' .  ':' . strtolower($k);
            }
            
            $query .= ' ' . implode(',', $queryParams);
        }
        
        $qb = $this->entityManager->createNativeQuery(
            $query,
            $rsm
            );
        
        if (count($params) > 0) {
            $parameters = [];
            foreach ($params as $k => $v) {
                $parameters[strtolower($k)] = urldecode($v);
            }
            
            $qb->setParameters($parameters);
        }
        
        $items = $qb->getResult();
        
        $collection = new ArrayCollection($items);
        
        return new StockDataCollection(new Collection($collection));
     }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for individual resources');
    }

    /**
     * Patch (partial in-place update) a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patchList($data)
    {
        return new ApiProblem(405, 'The PATCH method has not been defined for collections');
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for individual resources');
    }
}
