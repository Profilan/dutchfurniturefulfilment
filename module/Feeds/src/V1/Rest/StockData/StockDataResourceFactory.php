<?php
namespace Feeds\V1\Rest\StockData;

class StockDataResourceFactory
{
    public function __invoke($services)
    {
        $em = $services->get('doctrine.entitymanager.orm_default');
        
        return new StockDataResource($em);
    }
}
