<?php
namespace Shipment\V1\Rest\SalesOrderShipment;

use ZF\Apigility\Doctrine\Server\Resource\DoctrineResource;
use ZF\ApiProblem\ApiProblem;
use ZF\Apigility\Doctrine\Server\Event\DoctrineResourceEvent;
use Application\Entity\Shipment\SalesOrderShipment;

class SalesOrderShipmentResource extends DoctrineResource
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
        
        $data = $this->getQueryCreateFilter()->filter($this->getEvent(), $entityClass, $data);
        if ($data instanceof ApiProblem) {
            return $data;
        }
        
        $entity = new $entityClass;
        
        // Does the data already exists based on the SKU_Id
        
        /**
         * 
         * @var SalesOrderShipment $shipment
         */
        $shipments = $this->getObjectManager()->getRepository($entityClass)->findBy(array(
            'skuId' => $data->skuId
        ));
//         $shipment = $this->getObjectManager()->getRepository($entityClass)->findBy(array(
//             'skuId' => $data->skuId
//         ))[0];
        
        if (count($shipments) == 0) {
        
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
        
        } else {
            
            $entity = $this->findEntity($shipments[0]->getId(), 'update', $data);
            
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
        }
        
        $this->getObjectManager()->flush();
        
        return $entity;
    }
}
