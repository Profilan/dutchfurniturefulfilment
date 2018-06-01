<?php
return [
    'router' => [
        'routes' => [
            'shipment.rest.doctrine.purchase-order' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/purchase-order[/:ordernr]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\PurchaseOrder\\Controller',
                    ],
                ],
            ],
            'shipment.rest.doctrine.purchase-orderline' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/purchase-orderline[/:orderlineid]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller',
                    ],
                ],
            ],
            'shipment.rest.doctrine.supplier' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/supplier[/:suppliercode]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\Supplier\\Controller',
                    ],
                ],
            ],
            'shipment.rest.doctrine.stock-transaction' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/stock-transaction[/:id]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\StockTransaction\\Controller',
                    ],
                ],
            ],
            'shipment.rest.doctrine.sales-orderline-status' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/sales-orderline-status[/:id]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller',
                    ],
                ],
            ],
            'shipment.rest.doctrine.sales-orderline-pick-quantity' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/sales-orderline-pick-quantity[/:sales_orderline_pick_quantity_id]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller',
                    ],
                ],
            ],
            'shipment.rest.doctrine.sales-order-shipment' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/sales-order-shipment[/:sales_order_shipment_id]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller',
                    ],
                ],
            ],
            'shipment.rest.doctrine.status-code' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/status-code[/:status_code_id]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\StatusCode\\Controller',
                    ],
                ],
            ],
            'shipment.rest.doctrine.delivery-appointment' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/api/delivery-appointment[/:delivery_appointment_id]',
                    'defaults' => [
                        'controller' => 'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller',
                    ],
                ],
            ],
        ],
    ],
    'zf-versioning' => [
        'uri' => [
            0 => 'shipment.rest.doctrine.purchase-order',
            1 => 'shipment.rest.doctrine.purchase-orderline',
            2 => 'shipment.rest.doctrine.supplier',
            3 => 'shipment.rest.doctrine.stock-transaction',
            4 => 'shipment.rest.doctrine.sales-orderline-status',
            5 => 'shipment.rest.doctrine.sales-orderline-pick-quantity',
            6 => 'shipment.rest.doctrine.sales-order-shipment',
            7 => 'shipment.rest.doctrine.status-code',
            8 => 'shipment.rest.doctrine.delivery-appointment',
        ],
    ],
    'zf-rest' => [
        'Shipment\\V1\\Rest\\PurchaseOrder\\Controller' => [
            'listener' => \Shipment\V1\Rest\PurchaseOrder\PurchaseOrderResource::class,
            'route_name' => 'shipment.rest.doctrine.purchase-order',
            'route_identifier_name' => 'ordernr',
            'entity_identifier_name' => 'ordernr',
            'collection_name' => 'purchase_order',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [
                0 => 'suppliercode',
                1 => 'carrier',
                2 => 'searchstring',
            ],
            'page_size' => 25,
            'page_size_param' => 'limit',
            'entity_class' => \Application\Entity\Shipment\PurchaseOrder::class,
            'collection_class' => \Shipment\V1\Rest\PurchaseOrder\PurchaseOrderCollection::class,
            'service_name' => 'PurchaseOrder',
        ],
        'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller' => [
            'listener' => \Shipment\V1\Rest\PurchaseOrderline\PurchaseOrderlineResource::class,
            'route_name' => 'shipment.rest.doctrine.purchase-orderline',
            'route_identifier_name' => 'orderlineid',
            'entity_identifier_name' => 'orderlineid',
            'collection_name' => 'purchase_orderline',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [
                0 => 'carrier',
                1 => 'ordernr',
                2 => 'suppliercode',
            ],
            'page_size' => 25,
            'page_size_param' => 'limit',
            'entity_class' => \Application\Entity\Shipment\PurchaseOrderline::class,
            'collection_class' => \Shipment\V1\Rest\PurchaseOrderline\PurchaseOrderlineCollection::class,
            'service_name' => 'PurchaseOrderline',
        ],
        'Shipment\\V1\\Rest\\Supplier\\Controller' => [
            'listener' => \Shipment\V1\Rest\Supplier\SupplierResource::class,
            'route_name' => 'shipment.rest.doctrine.supplier',
            'route_identifier_name' => 'suppliercode',
            'entity_identifier_name' => 'suppliercode',
            'collection_name' => 'supplier',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [
                0 => 'carrier',
                1 => 'searchstring',
            ],
            'page_size' => 25,
            'page_size_param' => 'limit',
            'entity_class' => \Application\Entity\Shipment\Supplier::class,
            'collection_class' => \Shipment\V1\Rest\Supplier\SupplierCollection::class,
            'service_name' => 'Supplier',
        ],
        'Shipment\\V1\\Rest\\StockTransaction\\Controller' => [
            'listener' => \Shipment\V1\Rest\StockTransaction\StockTransactionResource::class,
            'route_name' => 'shipment.rest.doctrine.stock-transaction',
            'route_identifier_name' => 'id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'stock_transaction',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\Shipment\StockTransaction::class,
            'collection_class' => \Shipment\V1\Rest\StockTransaction\StockTransactionCollection::class,
            'service_name' => 'StockTransaction',
        ],
        'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller' => [
            'listener' => \Shipment\V1\Rest\SalesOrderlineStatus\SalesOrderlineStatusResource::class,
            'route_name' => 'shipment.rest.doctrine.sales-orderline-status',
            'route_identifier_name' => 'id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'sales_orderline_status',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\Shipment\SalesOrderlineStatus::class,
            'collection_class' => \Shipment\V1\Rest\SalesOrderlineStatus\SalesOrderlineStatusCollection::class,
            'service_name' => 'SalesOrderlineStatus',
        ],
        'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller' => [
            'listener' => \Shipment\V1\Rest\SalesOrderlinePickQuantity\SalesOrderlinePickQuantityResource::class,
            'route_name' => 'shipment.rest.doctrine.sales-orderline-pick-quantity',
            'route_identifier_name' => 'sales_orderline_pick_quantity_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'sales_orderline_pick_quantity',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\Shipment\SalesOrderlinePickQuantity::class,
            'collection_class' => \Shipment\V1\Rest\SalesOrderlinePickQuantity\SalesOrderlinePickQuantityCollection::class,
            'service_name' => 'SalesOrderlinePickQuantity',
        ],
        'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller' => [
            'listener' => \Shipment\V1\Rest\SalesOrderShipment\SalesOrderShipmentResource::class,
            'route_name' => 'shipment.rest.doctrine.sales-order-shipment',
            'route_identifier_name' => 'sales_order_shipment_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'sales_order_shipment',
            'entity_http_methods' => [
                0 => 'GET',
                1 => 'PUT',
            ],
            'collection_http_methods' => [
                0 => 'GET',
                1 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\Shipment\SalesOrderShipment::class,
            'collection_class' => \Shipment\V1\Rest\SalesOrderShipment\SalesOrderShipmentCollection::class,
            'service_name' => 'SalesOrderShipment',
        ],
        'Shipment\\V1\\Rest\\StatusCode\\Controller' => [
            'listener' => \Shipment\V1\Rest\StatusCode\StatusCodeResource::class,
            'route_name' => 'shipment.rest.doctrine.status-code',
            'route_identifier_name' => 'status_code_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'status_code',
            'entity_http_methods' => [
                0 => 'GET',
            ],
            'collection_http_methods' => [
                0 => 'GET',
            ],
            'collection_query_whitelist' => [
                0 => 'tableName',
            ],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\Shipment\StatusCode::class,
            'collection_class' => \Shipment\V1\Rest\StatusCode\StatusCodeCollection::class,
            'service_name' => 'StatusCode',
        ],
        'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller' => [
            'listener' => \Shipment\V1\Rest\DeliveryAppointment\DeliveryAppointmentResource::class,
            'route_name' => 'shipment.rest.doctrine.delivery-appointment',
            'route_identifier_name' => 'delivery_appointment_id',
            'entity_identifier_name' => 'id',
            'collection_name' => 'delivery_appointment',
            'entity_http_methods' => [],
            'collection_http_methods' => [
                0 => 'POST',
            ],
            'collection_query_whitelist' => [],
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => \Application\Entity\Shipment\DeliveryAppointment::class,
            'collection_class' => \Shipment\V1\Rest\DeliveryAppointment\DeliveryAppointmentCollection::class,
            'service_name' => 'DeliveryAppointment',
        ],
    ],
    'zf-content-negotiation' => [
        'controllers' => [
            'Shipment\\V1\\Rest\\PurchaseOrder\\Controller' => 'HalJson',
            'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller' => 'HalJson',
            'Shipment\\V1\\Rest\\Supplier\\Controller' => 'HalJson',
            'Shipment\\V1\\Rest\\StockTransaction\\Controller' => 'HalJson',
            'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller' => 'HalJson',
            'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller' => 'HalJson',
            'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller' => 'HalJson',
            'Shipment\\V1\\Rest\\StatusCode\\Controller' => 'HalJson',
            'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller' => 'HalJson',
        ],
        'accept-whitelist' => [
            'Shipment\\V1\\Rest\\PurchaseOrder\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\Supplier\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\StockTransaction\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\StatusCode\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller' => [
                0 => 'application/vnd.shipment.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ],
        ],
        'content-type-whitelist' => [
            'Shipment\\V1\\Rest\\PurchaseOrder\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\Supplier\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\StockTransaction\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\StatusCode\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller' => [
                0 => 'application/json',
            ],
        ],
        'accept_whitelist' => [
            'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
            'Shipment\\V1\\Rest\\PurchaseOrder\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
            'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
            'Shipment\\V1\\Rest\\Supplier\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
            'Shipment\\V1\\Rest\\StockTransaction\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
            'Shipment\\V1\\Rest\\StatusCode\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
            'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller' => [
                0 => 'application/json',
                1 => 'application/*+json',
            ],
        ],
        'content_type_whitelist' => [
            'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\PurchaseOrder\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\Supplier\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\StockTransaction\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\StatusCode\\Controller' => [
                0 => 'application/json',
            ],
            'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller' => [
                0 => 'application/json',
            ],
        ],
    ],
    'zf-hal' => [
        'metadata_map' => [
            \Application\Entity\Shipment\PurchaseOrder::class => [
                'route_identifier_name' => 'ordernr',
                'entity_identifier_name' => 'ordernr',
                'route_name' => 'shipment.rest.doctrine.purchase-order',
                'hydrator' => 'Shipment\\V1\\Rest\\PurchaseOrder\\PurchaseOrderHydrator',
            ],
            \Shipment\V1\Rest\PurchaseOrder\PurchaseOrderCollection::class => [
                'entity_identifier_name' => 'ordernr',
                'route_name' => 'shipment.rest.doctrine.purchase-order',
                'is_collection' => true,
            ],
            \Application\Entity\Shipment\PurchaseOrderline::class => [
                'route_identifier_name' => 'orderlineid',
                'entity_identifier_name' => 'orderlineid',
                'route_name' => 'shipment.rest.doctrine.purchase-orderline',
                'hydrator' => 'Shipment\\V1\\Rest\\PurchaseOrderline\\PurchaseOrderlineHydrator',
            ],
            \Shipment\V1\Rest\PurchaseOrderline\PurchaseOrderlineCollection::class => [
                'entity_identifier_name' => 'suppliercode',
                'route_name' => 'shipment.rest.doctrine.purchase-orderline',
                'is_collection' => true,
            ],
            \Application\Entity\Shipment\Supplier::class => [
                'route_identifier_name' => 'suppliercode',
                'entity_identifier_name' => 'suppliercode',
                'route_name' => 'shipment.rest.doctrine.supplier',
                'hydrator' => 'Shipment\\V1\\Rest\\Supplier\\SupplierHydrator',
            ],
            \Shipment\V1\Rest\Supplier\SupplierCollection::class => [
                'entity_identifier_name' => 'suppliercode',
                'route_name' => 'shipment.rest.doctrine.supplier',
                'is_collection' => true,
            ],
            \Application\Entity\Shipment\StockTransaction::class => [
                'route_identifier_name' => 'id',
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.stock-transaction',
                'hydrator' => 'Shipment\\V1\\Rest\\StockTransaction\\StockTransactionHydrator',
            ],
            \Shipment\V1\Rest\StockTransaction\StockTransactionCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.stock-transaction',
                'is_collection' => true,
            ],
            \Application\Entity\Shipment\SalesOrderlineStatus::class => [
                'route_identifier_name' => 'id',
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.sales-orderline-status',
                'hydrator' => 'Shipment\\V1\\Rest\\SalesOrderlineStatus\\SalesOrderlineStatusHydrator',
            ],
            \Shipment\V1\Rest\SalesOrderlineStatus\SalesOrderlineStatusCollection::class => [
                'entity_identifier_name' => 'salesOrderlineId',
                'route_name' => 'shipment.rest.doctrine.sales-orderline-status',
                'is_collection' => true,
            ],
            \Application\Entity\Shipment\SalesOrderlinePickQuantity::class => [
                'route_identifier_name' => 'sales_orderline_pick_quantity_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.sales-orderline-pick-quantity',
                'hydrator' => 'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\SalesOrderlinePickQuantityHydrator',
            ],
            \Shipment\V1\Rest\SalesOrderlinePickQuantity\SalesOrderlinePickQuantityCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.sales-orderline-pick-quantity',
                'is_collection' => true,
            ],
            \Application\Entity\Shipment\SalesOrderShipment::class => [
                'route_identifier_name' => 'sales_order_shipment_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.sales-order-shipment',
                'hydrator' => 'Shipment\\V1\\Rest\\SalesOrderShipment\\SalesOrderShipmentHydrator',
            ],
            \Shipment\V1\Rest\SalesOrderShipment\SalesOrderShipmentCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.sales-order-shipment',
                'is_collection' => true,
            ],
            \Application\Entity\Shipment\StatusCode::class => [
                'route_identifier_name' => 'status_code_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.status-code',
                'hydrator' => 'Shipment\\V1\\Rest\\StatusCode\\StatusCodeHydrator',
            ],
            \Shipment\V1\Rest\StatusCode\StatusCodeCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.status-code',
                'is_collection' => true,
            ],
            \Application\Entity\Shipment\DeliveryAppointment::class => [
                'route_identifier_name' => 'delivery_appointment_id',
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.delivery-appointment',
                'hydrator' => 'Shipment\\V1\\Rest\\DeliveryAppointment\\DeliveryAppointmentHydrator',
            ],
            \Shipment\V1\Rest\DeliveryAppointment\DeliveryAppointmentCollection::class => [
                'entity_identifier_name' => 'id',
                'route_name' => 'shipment.rest.doctrine.delivery-appointment',
                'is_collection' => true,
            ],
        ],
    ],
    'zf-apigility' => [
        'doctrine-connected' => [
            \Shipment\V1\Rest\PurchaseOrder\PurchaseOrderResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\PurchaseOrder\\PurchaseOrderHydrator',
                'query_providers' => [
                    'default' => 'default_orm',
                    'fetch_all' => 'purchase_order_fetch_all',
                    'fetch' => 'purchase_order_fetch',
                ],
            ],
            \Shipment\V1\Rest\PurchaseOrderline\PurchaseOrderlineResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\PurchaseOrderline\\PurchaseOrderlineHydrator',
                'query_providers' => [
                    'default' => 'default_orm',
                    'fetch_all' => 'purchase_orderline_fetch_all',
                    'fetch' => 'purchase_orderline_fetch',
                ],
            ],
            \Shipment\V1\Rest\Supplier\SupplierResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\Supplier\\SupplierHydrator',
                'query_providers' => [
                    'default' => 'default_orm',
                    'fetch_all' => 'supplier_fetch_all',
                    'fetch' => 'supplier_fetch',
                ],
            ],
            \Shipment\V1\Rest\StockTransaction\StockTransactionResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\StockTransaction\\StockTransactionHydrator',
            ],
            \Shipment\V1\Rest\SalesOrderlineStatus\SalesOrderlineStatusResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\SalesOrderlineStatus\\SalesOrderlineStatusHydrator',
            ],
            \Shipment\V1\Rest\SalesOrderlinePickQuantity\SalesOrderlinePickQuantityResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\SalesOrderlinePickQuantityHydrator',
            ],
            \Shipment\V1\Rest\SalesOrderShipment\SalesOrderShipmentResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\SalesOrderShipment\\SalesOrderShipmentHydrator',
            ],
            \Shipment\V1\Rest\StatusCode\StatusCodeResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\StatusCode\\StatusCodeHydrator',
                'query_providers' => [
                    'default' => 'default_orm',
                    'fetch_all' => 'status_code_fetch_all',
                ],
            ],
            \Shipment\V1\Rest\DeliveryAppointment\DeliveryAppointmentResource::class => [
                'object_manager' => 'doctrine.entitymanager.orm_default',
                'hydrator' => 'Shipment\\V1\\Rest\\DeliveryAppointment\\DeliveryAppointmentHydrator',
            ],
        ],
    ],
    'doctrine-hydrator' => [
        'Shipment\\V1\\Rest\\PurchaseOrder\\PurchaseOrderHydrator' => [
            'entity_class' => \Application\Entity\Shipment\PurchaseOrder::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Shipment\\V1\\Rest\\PurchaseOrderline\\PurchaseOrderlineHydrator' => [
            'entity_class' => \Application\Entity\Shipment\PurchaseOrderline::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Shipment\\V1\\Rest\\Supplier\\SupplierHydrator' => [
            'entity_class' => \Application\Entity\Shipment\Supplier::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Shipment\\V1\\Rest\\StockTransaction\\StockTransactionHydrator' => [
            'entity_class' => \Application\Entity\Shipment\StockTransaction::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Shipment\\V1\\Rest\\SalesOrderlineStatus\\SalesOrderlineStatusHydrator' => [
            'entity_class' => \Application\Entity\Shipment\SalesOrderlineStatus::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\SalesOrderlinePickQuantityHydrator' => [
            'entity_class' => \Application\Entity\Shipment\SalesOrderlinePickQuantity::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Shipment\\V1\\Rest\\SalesOrderShipment\\SalesOrderShipmentHydrator' => [
            'entity_class' => \Application\Entity\Shipment\SalesOrderShipment::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Shipment\\V1\\Rest\\StatusCode\\StatusCodeHydrator' => [
            'entity_class' => \Application\Entity\Shipment\StatusCode::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
        'Shipment\\V1\\Rest\\DeliveryAppointment\\DeliveryAppointmentHydrator' => [
            'entity_class' => \Application\Entity\Shipment\DeliveryAppointment::class,
            'object_manager' => 'doctrine.entitymanager.orm_default',
            'by_value' => true,
            'strategies' => [],
            'use_generated_hydrator' => true,
        ],
    ],
    'zf-content-validation' => [
        'Shipment\\V1\\Rest\\PurchaseOrder\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\PurchaseOrder\\Validator',
        ],
        'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\PurchaseOrderline\\Validator',
        ],
        'Shipment\\V1\\Rest\\Supplier\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\Supplier\\Validator',
        ],
        'Shipment\\V1\\Rest\\StockTransaction\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\StockTransaction\\Validator',
        ],
        'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Validator',
        ],
        'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Validator',
        ],
        'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\SalesOrderShipment\\Validator',
        ],
        'Shipment\\V1\\Rest\\StatusCode\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\StatusCode\\Validator',
        ],
        'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller' => [
            'input_filter' => 'Shipment\\V1\\Rest\\DeliveryAppointment\\Validator',
        ],
    ],
    'input_filter_specs' => [
        'Shipment\\V1\\Rest\\PurchaseOrder\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ORDERNR',
                'field_type' => 'varchar(9)',
                'description' => 'Ordernr De Eekhoorn',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'SUPPLIERCODE',
                'description' => 'Leveranciercode
Cicmpy.crdcode  nodig om te kunnen filteren op leverancier (naam/nummer).',
                'field_type' => 'varchar(8)',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'SUPPLIERNAME',
                'description' => 'Leverancier naam
Cicmpy.cmp_name  nodig om te kunnen filteren op leverancier (naam/nummer)',
                'field_type' => 'varchar(50)',
            ],
            3 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'DELIVERYDATE',
                'description' => 'Leverdatum',
                'field_type' => \DateTime::class,
            ],
            4 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ORDERDESCRIPTION',
                'description' => 'Inkooporder beschrijving',
                'field_type' => 'varchar(60)',
            ],
            5 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ORDERREF',
                'description' => 'Inkooporder referentie',
                'field_type' => 'varchar(60)',
            ],
        ],
        'Shipment\\V1\\Rest\\PurchaseOrderline\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ORDERLINEID',
                'description' => 'Unieke code',
                'field_type' => 'int',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ORDERNR',
                'description' => 'Ordernummer De Eekhoorn',
                'field_type' => 'varchar(9)',
            ],
            2 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'SUPPLIERCODE',
                'description' => 'Leveranciercode',
                'field_type' => 'varchar(10)',
            ],
            3 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'SUPPLIERNAME',
                'description' => 'Naam van de leverancier',
                'field_type' => 'varchar',
            ],
            4 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'QUANTITY',
                'description' => 'Aantal in Order',
                'field_type' => 'Float',
            ],
            5 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'DELIVERYDATE',
                'description' => 'Leverdatum',
                'field_type' => \DateTime::class,
            ],
            6 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ITEMCODE',
                'description' => 'Artikelcode',
                'field_type' => 'varchar(30)',
            ],
            7 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ITEMDESCRIPTION',
                'description' => 'Omschrijving Artike',
                'field_type' => 'varchar(60)',
            ],
            8 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'SALESUNIT',
                'description' => 'Eenheid',
                'field_type' => 'varchar(8)',
            ],
            9 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'EANCODE',
                'description' => 'EAN code',
                'field_type' => 'varchar(30)',
            ],
            10 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'BRAND',
                'description' => 'Merk',
                'field_type' => 'varchar(30)',
            ],
            11 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'PRODUCTGROUP',
                'description' => 'Artikelgroep',
                'field_type' => 'int',
            ],
            12 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'COLLIUNIT',
                'description' => 'Colli eenheid',
                'field_type' => 'varchar',
            ],
            13 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'SALESUNITPERCOLLI',
                'description' => 'Eenheden per verpakking',
                'field_type' => 'float',
            ],
            14 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'VOLUME',
                'description' => 'Volume in M3',
                'field_type' => 'float',
            ],
            15 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'WEIGHT',
                'description' => 'Gewicht/verpakking',
                'field_type' => 'float',
            ],
            16 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'HEIGHT',
                'description' => 'Hoogte',
                'field_type' => 'float',
            ],
            17 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'LENGTH',
                'description' => 'Lengte',
                'field_type' => 'float',
            ],
            18 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'WIDTH',
                'description' => 'Breedte',
                'field_type' => 'float',
            ],
            19 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ORDERDESCRIPTION',
                'description' => 'Inkooporder omschrijving',
                'field_type' => 'varchar(60)',
            ],
            20 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'ORDERREF',
                'description' => 'Inkooporder referentie',
                'field_type' => 'varchar(60)',
            ],
        ],
        'Shipment\\V1\\Rest\\Supplier\\Validator' => [
            0 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'SUPPLIERCODE',
                'description' => 'Leveranciercode',
                'field_type' => 'varchar(8)',
            ],
            1 => [
                'required' => true,
                'validators' => [],
                'filters' => [],
                'name' => 'SUPPLIERNAME',
                'description' => 'Leveranciernaam',
                'field_type' => 'varchar(50)',
            ],
        ],
        'Shipment\\V1\\Rest\\StockTransaction\\Validator' => [
            0 => [
                'name' => 'orderlineId',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Unieke id',
                'field_type' => 'int',
            ],
            1 => [
                'name' => 'warehouse',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '30',
                        ],
                    ],
                ],
                'description' => 'Magazijn',
                'field_type' => 'varchar(30)',
            ],
            2 => [
                'name' => 'warehouseLocation',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '30',
                        ],
                    ],
                ],
                'description' => 'Magazijn locatie',
                'field_type' => 'varchar(30)',
            ],
            3 => [
                'name' => 'itemCode',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '30',
                        ],
                    ],
                ],
                'description' => 'Artikelcode',
                'field_type' => 'varchar(30)',
            ],
            4 => [
                'name' => 'quantity',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Aantal in verkoopeenheid',
                'field_type' => 'float',
            ],
            5 => [
                'name' => 'transactionType',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Type transactie',
                'field_type' => 'int',
            ],
            6 => [
                'name' => 'description',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '100',
                        ],
                    ],
                ],
                'description' => 'Omschrijving transactie',
                'field_type' => 'varchar(100)',
            ],
            7 => [
                'name' => 'status',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Status',
                'field_type' => 'int',
            ],
            8 => [
                'name' => 'processDate',
                'required' => false,
                'filters' => [],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\Date::class,
                        'options' => [
                            'format' => 'Y-m-d H:i:s',
                        ],
                    ],
                ],
                'description' => 'Verwerkingsdatum',
                'field_type' => 'datetime(YYYY-MM-DD HH:MM:SS)',
            ],
        ],
        'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Validator' => [
            0 => [
                'name' => 'salesOrderlineId',
                'required' => true,
                'filters' => [],
                'validators' => [
                    0 => [
                        'name' => \Zend\I18n\Validator\IsInt::class,
                        'options' => [],
                    ],
                ],
                'description' => 'Id dat overeenkomt met het Id in tabel EEK_DISTRIBUTION_SALESORDERLINES. Dit Id dient bekend te zijn bij de vervoerder, bijvoorbeeld doordat we dit inschieten in hun API (CustomerLineId)',
                'field_type' => 'int',
            ],
            1 => [
                'name' => 'status',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\I18n\Validator\IsInt::class,
                        'options' => [],
                    ],
                ],
                'description' => 'Status',
                'field_type' => 'int',
            ],
            2 => [
                'name' => 'statusDescription',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '255',
                        ],
                    ],
                ],
                'description' => 'Status omschrijving',
                'field_type' => 'varchar(100)',
            ],
            3 => [
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '20',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                ],
                'name' => 'carrier',
                'description' => 'Vervoerder. Dient te corresponderen met crediteurnummer in Exact. Opties:
998000 - Dusseldorp
999068 - DutchNed
900339 - De Zwaluw',
                'field_type' => 'varchar(20)',
            ],
            4 => [
                'name' => 'transactionDate',
                'required' => true,
                'filters' => [],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\Date::class,
                        'options' => [
                            'format' => 'Y-m-d H:i:s',
                        ],
                    ],
                ],
                'description' => 'Transaction Date',
                'field_type' => \datetime::class,
            ],
            5 => [
                'required' => false,
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '255',
                        ],
                    ],
                ],
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                        'options' => [],
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                        'options' => [],
                    ],
                ],
                'name' => 'trackTrace',
                'description' => 'Carrier reference',
                'field_type' => 'nvarchar(MAX)',
            ],
        ],
        'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Validator' => [
            0 => [
                'name' => 'orderlineId',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Unieke order regel ID',
                'field_type' => 'int',
            ],
            1 => [
                'name' => 'itemcode',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '30',
                        ],
                    ],
                ],
                'description' => 'Artikelcode',
                'field_type' => 'varchar(30)',
            ],
            2 => [
                'name' => 'quantityPicked',
                'required' => true,
                'filters' => [],
                'validators' => [],
                'description' => 'Aantal gepickt',
                'field_type' => 'float',
            ],
            3 => [
                'name' => 'quantityShortage',
                'required' => false,
                'filters' => [],
                'validators' => [],
                'description' => 'Aantal manco',
                'field_type' => 'float',
            ],
            4 => [
                'name' => 'reasonShortage',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '100',
                        ],
                    ],
                ],
                'description' => 'Reden manco',
                'field_type' => 'varchar(100)',
            ],
        ],
        'Shipment\\V1\\Rest\\SalesOrderShipment\\Validator' => [
            0 => [
                'name' => 'shipmentId',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Unieke ID van de zending',
                'field_type' => 'int',
            ],
            1 => [
                'name' => 'debtorNumber',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '10',
                        ],
                    ],
                ],
                'description' => 'Debiteurnummer',
                'field_type' => 'varchar(10)',
            ],
            2 => [
                'name' => 'skuType',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '10',
                        ],
                    ],
                ],
                'description' => 'Pallettype of Colli:
PALA, PALB, PALC, COLLI etc.',
                'field_type' => 'varchar(10)',
            ],
            3 => [
                'name' => 'skuId',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '20',
                        ],
                    ],
                ],
                'description' => 'Unieke ID van de SKU',
                'field_type' => 'varchar(20)',
            ],
            4 => [
                'name' => 'carrier',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '50',
                        ],
                    ],
                ],
                'description' => 'Vervoerder',
                'field_type' => 'varchar(50)',
            ],
            5 => [
                'name' => 'deliveryDate',
                'required' => true,
                'filters' => [],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\Date::class,
                        'options' => [
                            'format' => 'Y-m-d H:i:s',
                        ],
                    ],
                ],
                'description' => 'Afleverdatum',
                'field_type' => 'datetime(YYYY-MM-DD HH:MM:SS)',
            ],
            6 => [
                'name' => 'debtorName',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '50',
                        ],
                    ],
                ],
                'description' => 'Afleveradres naam',
                'field_type' => 'varchar(50)',
            ],
            7 => [
                'name' => 'delAddress',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '100',
                        ],
                    ],
                ],
                'description' => 'Afleveradres',
                'field_type' => 'varchar(100)',
            ],
            8 => [
                'name' => 'delPostcode',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '20',
                        ],
                    ],
                ],
                'description' => 'Aflever postcode',
                'field_type' => 'varchar(20)',
            ],
            9 => [
                'name' => 'delCity',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '100',
                        ],
                    ],
                ],
                'description' => 'Aflever plaats',
                'field_type' => 'varchar(100)',
            ],
            10 => [
                'name' => 'delCountryCode',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    2 => [
                        'name' => \Zend\Filter\StringToUpper::class,
                        'options' => [],
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '2',
                        ],
                    ],
                ],
                'description' => 'Aflever landcode',
                'field_type' => 'varchar(2)',
            ],
            11 => [
                'name' => 'trackTraceCode',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '50',
                        ],
                    ],
                ],
                'description' => 'Track and Trace code',
                'field_type' => 'varchar(50)',
            ],
            12 => [
                'name' => 'trackTraceUrl',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '100',
                        ],
                    ],
                ],
                'description' => 'Track and Trace Url',
                'field_type' => 'varchar(250)',
            ],
            13 => [
                'name' => 'status',
                'required' => false,
                'filters' => [],
                'validators' => [],
                'description' => 'Status',
                'field_type' => 'integer',
            ],
        ],
        'Shipment\\V1\\Rest\\StatusCode\\Validator' => [
            0 => [
                'name' => 'status',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [],
                'field_type' => 'integer',
                'description' => 'Status code',
            ],
            1 => [
                'name' => 'tableName',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Name of the table for a list of related statuscodes',
                'field_type' => 'string',
            ],
            2 => [
                'name' => 'description',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Status description',
                'field_type' => 'string',
            ],
        ],
        'Shipment\\V1\\Rest\\DeliveryAppointment\\Validator' => [
            0 => [
                'name' => 'carrier',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '20',
                        ],
                    ],
                ],
                'description' => 'Name of the carrier',
                'field_type' => 'varchar(20)',
            ],
            1 => [
                'name' => 'salesOrderlineId',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\I18n\Validator\IsInt::class,
                        'options' => [],
                    ],
                ],
                'description' => 'Reference to sales orderline ID',
                'field_type' => 'int',
            ],
            2 => [
                'name' => 'type',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\StringLength::class,
                        'options' => [
                            'max' => '100',
                        ],
                    ],
                ],
                'description' => 'Delivery type',
                'field_type' => 'nvarchar(100)',
            ],
            3 => [
                'name' => 'status',
                'required' => true,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\Digits::class,
                    ],
                ],
                'validators' => [
                    0 => [
                        'name' => \Zend\I18n\Validator\IsInt::class,
                        'options' => [],
                    ],
                ],
                'description' => 'Status code',
                'field_type' => 'int',
            ],
            4 => [
                'name' => 'deliveryTimeFrom',
                'required' => true,
                'filters' => [],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\Date::class,
                        'options' => [
                            'format' => 'Y-m-d H:i:s',
                        ],
                    ],
                ],
                'description' => 'Expected Delivery Time From',
                'field_type' => \datetime::class,
            ],
            5 => [
                'name' => 'deliveryTimeTo',
                'required' => true,
                'filters' => [],
                'validators' => [
                    0 => [
                        'name' => \Zend\Validator\Date::class,
                        'options' => [
                            'format' => 'Y-m-d H:i:s',
                        ],
                    ],
                ],
                'description' => 'Expected Delivery Time To',
                'field_type' => \datetime::class,
            ],
            6 => [
                'name' => 'deliveryRemark',
                'required' => false,
                'filters' => [
                    0 => [
                        'name' => \Zend\Filter\StringTrim::class,
                    ],
                    1 => [
                        'name' => \Zend\Filter\StripTags::class,
                    ],
                ],
                'validators' => [],
                'description' => 'Remarks on delivery',
                'field_type' => 'nvarchar(max)',
            ],
        ],
    ],
    'zf-apigility-doctrine-query-provider' => [
        'aliases' => [
            'purchase_order_fetch_all' => \Application\Query\Provider\PurchaseOrder\FetchAll::class,
            'purchase_order_fetch' => \Application\Query\Provider\PurchaseOrder\Fetch::class,
            'purchase_orderline_fetch_all' => \Application\Query\Provider\PurchaseOrderline\FetchAll::class,
            'purchase_orderline_fetch' => \Application\Query\Provider\PurchaseOrderline\Fetch::class,
            'supplier_fetch_all' => \Application\Query\Provider\Supplier\FetchAll::class,
            'supplier_fetch' => \Application\Query\Provider\Supplier\Fetch::class,
            'status_code_fetch_all' => \Application\Query\Provider\StatusCode\FetchAll::class,
        ],
        'factories' => [
            \Application\Query\Provider\PurchaseOrder\FetchAll::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Query\Provider\PurchaseOrder\Fetch::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Query\Provider\PurchaseOrderline\FetchAll::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Query\Provider\PurchaseOrderline\Fetch::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Query\Provider\Supplier\FetchAll::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Query\Provider\Supplier\Fetch::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
            \Application\Query\Provider\StatusCode\FetchAll::class => \Zend\ServiceManager\Factory\InvokableFactory::class,
        ],
    ],
];
