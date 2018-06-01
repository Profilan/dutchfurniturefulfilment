<?php
return [
    'Feeds\\V1\\Rest\\StockData\\Controller' => [
        'collection' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/stock-data"
       },
       "first": {
           "href": "/api/stock-data?page={page}"
       },
       "prev": {
           "href": "/api/stock-data?page={page}"
       },
       "next": {
           "href": "/api/stock-data?page={page}"
       },
       "last": {
           "href": "/api/stock-data?page={page}"
       }
   }
   "_embedded": {
       "stock_data": [
           {
               "_links": {
                   "self": {
                       "href": "/api/stock-data[/:itemcode]"
                   }
               }
              "ITEMCODE": "Productcode - unique reference",
              "EAN": "EAN code - unique reference",
              "STOCKLEVEL": "Stock position",
              "STATUS": "Product status / category (informational field)",
              "ATP": "Next expected availability date (shipment ex. works)",
              "DFF_SHIPMENT": "Shipment category (POST/CARRIER)"
           }
       ]
   }
}',
            ],
        ],
        'description' => 'Technical specification:

URL Specification:

For getting a list of products the following url is needed:

    - https://is.dutchfurniturefulfilment.nl/api/stock-data?debcode={debcode}&apikey={apikey}[&page={page}][&limit={page_size}]

For a single product the following url is needed:

    - https://is.dutchfurniturefulfilment.nl/api/stock-data/{itemcode/eancode}?apikey={apikey}

Restrictions:

     - The debcode and apikey are mandatory and are case sensitive.
     - The itemcode should be encoded following RFC 3986. 
       For example: P375689-C 2#2 should be encoded to P375689-C%202%232

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.',
        'entity' => [
            'GET' => [
                'response' => '{
   "_links": {
       "self": {
           "href": "/api/stock-data[/:itemcode]"
       }
   }
   "ITEMCODE": "Productcode - unique reference",
   "EAN": "EAN code - unique reference",
   "STOCKLEVEL": "Stock position",
   "STATUS": "Product status / category (informational field)",
   "ATP": "Next expected availability date (shipment ex. works)",
   "DFF_SHIPMENT": "Shipment category (POST/CARRIER)"
}',
            ],
        ],
    ],
];
