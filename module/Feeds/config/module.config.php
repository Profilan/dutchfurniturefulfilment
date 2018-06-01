<?php
return [
    'service_manager' => [
        'factories' => [
            \Feeds\V1\Rest\StockData\StockDataResource::class => \Feeds\V1\Rest\StockData\StockDataResourceFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'feeds.rest.stock-data' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/stock-data[/:itemcode]',
                    'defaults' => [
                        'controller' => 'Feeds\\V1\\Rest\\StockData\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'feeds.rest.stock-data',
        ],
    ],
    'zf-rest' => [
        'Feeds\\V1\\Rest\\StockData\\Controller' => [
            'listener' => \Feeds\V1\Rest\StockData\StockDataResource::class,
            'route_name' => 'feeds.rest.stock-data',
            'route_identifier_name' => 'itemcode',
            'collection_name' => 'stock_data',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [
                0 => 'debcode',
            ],
            'page_size' => 25,
            'page_size_param' => 'limit',
            'entity_class' => \Feeds\V1\Rest\StockData\StockDataEntity::class,
            'collection_class' => \Feeds\V1\Rest\StockData\StockDataCollection::class,
            'service_name' => 'StockData',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Feeds\\V1\\Rest\\StockData\\Controller' => 'HalJson',
        ],
        'accept_whitelist' => [
            'Feeds\\V1\\Rest\\StockData\\Controller' => [
                0 => 'application/vnd.feeds.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content_type_whitelist' => [
            'Feeds\\V1\\Rest\\StockData\\Controller' => [
                0 => 'application/vnd.feeds.v1+json',
                1 => 'application/json',
            ],
        ],
        'accept-whitelist' => [],
        'content-type-whitelist' => [],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Feeds\V1\Rest\StockData\StockDataEntity::class => [
                'entity_identifier_name' => 'ITEMCODE',
                'route_name' => 'feeds.rest.stock-data',
                'route_identifier_name' => 'itemcode',
                'hydrator' => \Zend\Hydrator\ArraySerializable::class,
            ],
            \Feeds\V1\Rest\StockData\StockDataCollection::class => [
                'entity_identifier_name' => 'ITEMCODE',
                'route_name' => 'feeds.rest.stock-data',
                'route_identifier_name' => 'itemcode',
                'is_collection' => true,
            ],
            'links' => [
                'route' => [
                    'params' => [
                        'foo' => 'bar',
                    ],
                ],
            ],
        ],
    ],
    'zf-content-validation' => [
        'Feeds\\V1\\Rest\\StockData\\Controller' => [
            'input_filter' => 'Feeds\\V1\\Rest\\StockData\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Feeds\\V1\\Rest\\StockData\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ITEMCODE',
                'description' => 'Productcode - unique reference',
                'field_type' => 'string',
            ],
            1 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'EAN',
                'description' => 'EAN code - unique reference',
                'allow_empty' => true,
                'field_type' => 'string',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'STOCKLEVEL',
                'description' => 'Stock position',
                'field_type' => 'integer',
            ],
            3 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'STATUS',
                'description' => 'Product status / category (informational field)',
                'field_type' => 'string',
            ],
            4 => [
                'required' => false,
                'validators' => [],
                'filters' => [],
                'name' => 'ATP',
                'description' => 'Next expected availability date (shipment ex. works)',
                'allow_empty' => true,
                'field_type' => 'string',
            ],
            5 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'DFF_SHIPMENT',
                'description' => 'Shipment category (POST/CARRIER)',
                'field_type' => 'string',
            ],
        ],
    ],
    'doctrine' => [
        'driver' => [
            'feeds_entities' => [
                'class' => \Doctrine\ORM\Mapping\Driver\AnnotationDriver::class,
                'cache' => 'array',
                'paths' => [
                    0 => 'C:\\Program Files (x86)\\Zend\\Apache2\\htdocs\\dutchfurniture.test\\module\\Feeds\\config/../src/V1/Rest/StockData',
                ],
            ],
            'orm_default' => [
                'drivers' => [
                    'Feeds\\V1\\Rest\\StockData' => 'feeds_entities',
                ],
            ],
        ],
    ],
    'zf-mvc-auth' => [
        'authorization' => [
            'Feeds\\V1\\Rest\\StockData\\Controller' => [
                'collection' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
                'entity' => [
                    'GET' => true,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ],
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [],
    ],
    'doctrine-hydrator' => [],
];
