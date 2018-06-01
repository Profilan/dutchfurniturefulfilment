<?php
return [
    'Shipment\\V1\\Rest\\PurchaseOrder\\Controller' => [
        'description' => 'Zoek inkooporder

Technical specification:

URL Specification:

For getting a list of purchase orders the following url is needed:

    - https://is.dutchfurniturefulfilment.nl/api/purchase-order?carrier={carrier}[&suppliercode={suppliercode}][&searchstring={ordernr/orderdescription}]&apikey={apikey}[&page={page}][&limit={page_size}]

Restrictions:

     - The supplier, carrier and apikey are mandatory and are case sensitive.
     - The searchstring is optional and is case sensitive.

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.',
        'collection' => [
            'GET' => [
                'response' => '{
   "ORDERNR": "Ordernr De Eekhoorn",
   "SUPPLIERCODE": "Leveranciercode
Cicmpy.crdcode  nodig om te kunnen filteren op leverancier (naam/nummer).",
   "SUPPLIERNAME": "Leverancier naam
Cicmpy.cmp_name  nodig om te kunnen filteren op leverancier (naam/nummer)",
   "DELIVERYDATE": "Leverdatum",
   "ORDERDESCRIPTION": "Inkooporder beschrijving",
   "ORDERREF": "Inkooporder referentie"
}',
            ],
        ],
        'entity' => [
            'GET' => [
                'response' => '{
   "ORDERNR": "Ordernr De Eekhoorn",
   "SUPPLIERCODE": "Leveranciercode
Cicmpy.crdcode  nodig om te kunnen filteren op leverancier (naam/nummer).",
   "SUPPLIERNAME": "Leverancier naam
Cicmpy.cmp_name  nodig om te kunnen filteren op leverancier (naam/nummer)",
   "DELIVERYDATE": "Leverdatum",
   "ORDERDESCRIPTION": "Inkooporder beschrijving",
   "ORDERREF": "Inkooporder referentie"
}',
            ],
        ],
    ],
    'Shipment\\V1\\Rest\\PurchaseOrderline\\Controller' => [
        'collection' => [
            'GET' => [
                'response' => '{
   "ORDERLINEID": "Unieke code",
   "ORDERNR": "Ordernummer De Eekhoorn",
   "SUPPLIERCODE": "Leveranciercode",
   "SUPPLIERNAME": "Naam van de leverancier",
   "QUANTITY": "Aantal in Order",
   "DELIVERYDATE": "Leverdatum",
   "ITEMCODE": "Artikelcode",
   "ITEMDESCRIPTION": "Omschrijving Artike",
   "SALESUNIT": "Eenheid",
   "EANCODE": "EAN code",
   "BRAND": "Merk",
   "PRODUCTGROUP": "Artikelgroep",
   "COLLIUNIT": "Colli eenheid",
   "SALESUNITPERCOLLI": "Eenheden per verpakking",
   "VOLUME": "Volume in M3",
   "WEIGHT": "Gewicht/verpakking",
   "HEIGHT": "Hoogte",
   "LENGTH": "Lengte",
   "WIDTH": "Breedte",
   "ORDERDESCRIPTION": "Inkooporder omschrijving",
   "ORDERREF": "Inkooporder referentie"
}',
            ],
        ],
        'entity' => [
            'GET' => [
                'response' => '{
   "ORDERLINEID": "Unieke code",
   "ORDERNR": "Ordernummer De Eekhoorn",
   "SUPPLIERCODE": "Leveranciercode",
   "SUPPLIERNAME": "Naam van de leverancier",
   "QUANTITY": "Aantal in Order",
   "DELIVERYDATE": "Leverdatum",
   "ITEMCODE": "Artikelcode",
   "ITEMDESCRIPTION": "Omschrijving Artike",
   "SALESUNIT": "Eenheid",
   "EANCODE": "EAN code",
   "BRAND": "Merk",
   "PRODUCTGROUP": "Artikelgroep",
   "COLLIUNIT": "Colli eenheid",
   "SALESUNITPERCOLLI": "Eenheden per verpakking",
   "VOLUME": "Volume in M3",
   "WEIGHT": "Gewicht/verpakking",
   "HEIGHT": "Hoogte",
   "LENGTH": "Lengte",
   "WIDTH": "Breedte",
   "ORDERDESCRIPTION": "Inkooporder omschrijving",
   "ORDERREF": "Inkooporder referentie"
}',
            ],
        ],
        'description' => 'Search purchase orderlines.

Technical specification:

URL Specification:

For getting a list of purchase orderlines the following url is needed:

    - https://is.dutchfurniturefulfilment.nl/api/purchase-orderline?carrier={carrier}[&suppliercode={suppliercode}][&ordernr={ordernr}]&apikey={apikey}[&page={page}][&limit={page_size}]

Restrictions:

     - The carrier and apikey are mandatory and are case sensitive.
     - The suppliercode and ordernr are optional and are case sensitive.

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.',
    ],
    'Shipment\\V1\\Rest\\Supplier\\Controller' => [
        'collection' => [
            'GET' => [
                'response' => '{
   "SUPPLIERCODE": "Leveranciercode",
   "SUPPLIERNAME": "Leveranciernaam"
}',
            ],
        ],
        'entity' => [
            'GET' => [
                'response' => '{
   "SUPPLIERCODE": "Leveranciercode",
   "SUPPLIERNAME": "Leveranciernaam"
}',
            ],
        ],
        'description' => 'Search supplier

Technical specification:

URL Specification:

For getting a list of suppliers the following url is needed:

    - https://is.dutchfurniturefulfilment.nl/api/supplier?carrier={carrier}[&searchstring={suppliercode/suppliername}]&apikey={apikey}[&page={page}][&limit={page_size}]

Restrictions:

     - The carrier and apikey are mandatory and are case sensitive.
     - The searchstring is optional and is case sensitive. If no searchstring is provided, all suppliers are showed.

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.',
    ],
    'Shipment\\V1\\Rest\\SalesOrderlinePickQuantity\\Controller' => [
        'description' => 'SalesOrderlinePickQuantity omschrijving

Technical specification:

URL Specification:

For inserting a orderline pick quantity the following URL is needed:

    - https://is.dutchfurniturefulfilment.nl/api/sales-orderline-pick-quantity?apikey={apikey}

Restrictions:

     - The apikey is mandatory and are case sensitive.

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.',
        'collection' => [
            'POST' => [
                'request' => '{
   "orderlineId": "Unieke order regel ID",
   "itemcode": "Artikelcode",
   "quantityPicked": "Aantal gepickt",
   "quantityShortage": "Aantal manco",
   "reasonShortage": "Reden manco",
   "test": "Test mutatie"
}',
                'response' => '{
   "orderlineId": "Unieke order regel ID",
   "itemcode": "Artikelcode",
   "quantityPicked": "Aantal gepickt",
   "quantityShortage": "Aantal manco",
   "reasonShortage": "Reden manco",
   "test": "Test mutatie"
}',
            ],
        ],
    ],
    'Shipment\\V1\\Rest\\StockTransaction\\Controller' => [
        'collection' => [
            'PUT' => [
                'request' => '{
   "orderlineId": "Unieke id",
   "warehouse": "Magazijn",
   "warehouseLocation": "Magazijn locatie",
   "itemCode": "Artikelcode",
   "quantity": "Aantal in verkoopeenheid",
   "transactionType": "Type transactie",
   "description": "Omschrijving transactie",
   "status": "Status",
   "sysCreated": "",
   "sysCreator": "",
   "sysModified": "",
   "sysModifier": ""
}',
                'response' => '{
   "orderlineId": "Unieke id",
   "warehouse": "Magazijn",
   "warehouseLocation": "Magazijn locatie",
   "itemCode": "Artikelcode",
   "quantity": "Aantal in verkoopeenheid",
   "transactionType": "Type transactie",
   "description": "Omschrijving transactie",
   "status": "Status",
   "sysCreated": "",
   "sysCreator": "",
   "sysModified": "",
   "sysModifier": ""
}',
            ],
            'POST' => [
                'request' => '{
   "orderlineId": "Unieke id",
   "warehouse": "Magazijn",
   "warehouseLocation": "Magazijn locatie",
   "itemCode": "Artikelcode",
   "quantity": "Aantal in verkoopeenheid",
   "transactionType": "Type transactie",
   "description": "Omschrijving transactie",
   "status": "Status",
   "test": "Test indicator"
}',
                'response' => '{
   "orderlineId": "Unieke id",
   "warehouse": "Magazijn",
   "warehouseLocation": "Magazijn locatie",
   "itemCode": "Artikelcode",
   "quantity": "Aantal in verkoopeenheid",
   "transactionType": "Type transactie",
   "description": "Omschrijving transactie",
   "status": "Status",
   "test": "Test indicator"
}',
            ],
        ],
        'entity' => [
            'PUT' => [
                'request' => '{
   "orderlineId": "Unieke id",
   "warehouse": "Magazijn",
   "warehouseLocation": "Magazijn locatie",
   "itemCode": "Artikelcode",
   "quantity": "Aantal in verkoopeenheid",
   "transactionType": "Type transactie",
   "description": "Omschrijving transactie",
   "status": "Status",
   "sysCreated": "",
   "sysCreator": "",
   "sysModified": "",
   "sysModifier": ""
}',
                'response' => '{
   "orderlineId": "Unieke id",
   "warehouse": "Magazijn",
   "warehouseLocation": "Magazijn locatie",
   "itemCode": "Artikelcode",
   "quantity": "Aantal in verkoopeenheid",
   "transactionType": "Type transactie",
   "description": "Omschrijving transactie",
   "status": "Status",
   "sysCreated": "",
   "sysCreator": "",
   "sysModified": "",
   "sysModifier": ""
}',
            ],
            'POST' => [
                'request' => '{
   "orderlineId": "Unieke id",
   "warehouse": "Magazijn",
   "warehouseLocation": "Magazijn locatie",
   "itemCode": "Artikelcode",
   "quantity": "Aantal in verkoopeenheid",
   "transactionType": "Type transactie",
   "description": "Omschrijving transactie",
   "status": "Status",
   "sysCreated": "",
   "sysCreator": "",
   "sysModified": "",
   "sysModifier": ""
}',
                'response' => '{
   "orderlineId": "Unieke id",
   "warehouse": "Magazijn",
   "warehouseLocation": "Magazijn locatie",
   "itemCode": "Artikelcode",
   "quantity": "Aantal in verkoopeenheid",
   "transactionType": "Type transactie",
   "description": "Omschrijving transactie",
   "status": "Status",
   "sysCreated": "",
   "sysCreator": "",
   "sysModified": "",
   "sysModifier": ""
}',
            ],
        ],
        'description' => 'Terugkoppeling van inkoopontvangst en losse tellingen aan De Eekhoorn.

Technical specification:

URL Specification:

For inserting a stock transaction the following URL is needed:

    - https://is.dutchfurniturefulfilment.nl/api/stock-transaction?apikey={apikey}

Restrictions:

     - The apikey is mandatory and is case sensitive.

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.

',
    ],
    'Shipment\\V1\\Rest\\StatusCode\\Controller' => [
        'collection' => [
            'GET' => [
                'response' => '{
   "status": "Status code",
   "tableName": "Name of the table for a list of related statuscodes",
   "description": "Status description"
}',
            ],
        ],
        'entity' => [
            'GET' => [
                'response' => '{
   "status": "Status code",
   "tableName": "Name of the table for a list of related statuscodes",
   "description": "Status description"
}',
            ],
        ],
    ],
    'Shipment\\V1\\Rest\\DeliveryAppointment\\Controller' => [
        'collection' => [
            'POST' => [
                'request' => '{
   "carrier": "Name of the carrier",
   "salesOrderlineId": "Reference to sales orderline ID",
   "type": "Delivery type",
   "status": "Status code",
   "deliveryTimeFrom": "Expected Delivery Time From",
   "deliveryTimeTo": "Expected Delivery Time To",
   "deliveryRemark": "Remarks on delivery"
}',
                'response' => '{
   "carrier": "Name of the carrier",
   "salesOrderlineId": "Reference to sales orderline ID",
   "type": "Delivery type",
   "status": "Status code",
   "deliveryTimeFrom": "Expected Delivery Time From",
   "deliveryTimeTo": "Expected Delivery Time To",
   "deliveryRemark": "Remarks on delivery"
}',
            ],
        ],
        'description' => '

Technical specification:

URL Specification:

For updating a sales orderline with a deliviry status the following URL is needed:

    - POST https://is.dutchfurniturefulfilment.nl/api/delivery-appointment/?apikey={apikey}

Restrictions:

     - The apikey is mandatory and is case sensitive.

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.',
    ],
    'Shipment\\V1\\Rest\\SalesOrderlineStatus\\Controller' => [
        'entity' => [
            'PUT' => [
                'request' => '{
   "orderlineId": "Order regel ID",
   "status": "Status",
   "statusDescription": "Status omschrijving",
   "test": "Test indicator"
}',
                'response' => '{
   "orderlineId": "Order regel ID",
   "status": "Status",
   "statusDescription": "Status omschrijving",
   "test": "Test indicator"
}',
            ],
        ],
        'description' => '

Technical specification:

URL Specification:

For updating a sales orderline the following URL is needed:

    - https://is.dutchfurniturefulfilment.nl/api/sales-orderline-status/?apikey={apikey}

Restrictions:

     - The apikey is mandatory and is case sensitive.

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.',
        'collection' => [
            'POST' => [
                'request' => '{
   "salesOrderlineId": "Id dat overeenkomt met het Id in tabel EEK_DISTRIBUTION_SALESORDERLINES. Dit Id dient bekend te zijn bij de vervoerder, bijvoorbeeld doordat we dit inschieten in hun API (CustomerLineId)",
   "status": "Status",
   "statusDescription": "Status omschrijving",
   "carrier": "Vervoerder. Dient te corresponderen met crediteurnummer in Exact. Opties:
998000 - Dusseldorp
999068 - DutchNed
900339 - De Zwaluw",
   "transactionDate": "Transaction Date",
   "trackTrace": "Carrier reference"
}',
                'response' => '{
   "salesOrderlineId": "Id dat overeenkomt met het Id in tabel EEK_DISTRIBUTION_SALESORDERLINES. Dit Id dient bekend te zijn bij de vervoerder, bijvoorbeeld doordat we dit inschieten in hun API (CustomerLineId)",
   "status": "Status",
   "statusDescription": "Status omschrijving",
   "carrier": "Vervoerder. Dient te corresponderen met crediteurnummer in Exact. Opties:
998000 - Dusseldorp
999068 - DutchNed
900339 - De Zwaluw",
   "transactionDate": "Transaction Date",
   "trackTrace": "Carrier reference"
}',
            ],
        ],
    ],
    'Shipment\\V1\\Rest\\SalesOrderShipment\\Controller' => [
        'collection' => [
            'POST' => [
                'request' => '{
   "shipmentId": "Unieke ID van de zending",
   "debtorNumber": "Debiteurnummer",
   "skuType": "Pallettype of Colli:
PALA, PALB, PALC, COLLI etc.",
   "skuId": "Unieke ID van de SKU",
   "carrier": "Vervoerder",
   "deliveryDate": "Afleverdatum",
   "debtorName": "Afleveradres naam",
   "delAddress": "Afleveradres",
   "delPostcode": "Aflever postcode",
   "delCity": "Aflever plaats",
   "delCountryCode": "Aflever landcode",
   "trackTraceCode": "Track and Trace code",
   "trackTraceUrl": "Track and Trace Url",
   "status": "Status"
}',
                'response' => '{
   "shipmentId": "Unieke ID van de zending",
   "debtorNumber": "Debiteurnummer",
   "skuType": "Pallettype of Colli:
PALA, PALB, PALC, COLLI etc.",
   "skuId": "Unieke ID van de SKU",
   "carrier": "Vervoerder",
   "deliveryDate": "Afleverdatum",
   "debtorName": "Afleveradres naam",
   "delAddress": "Afleveradres",
   "delPostcode": "Aflever postcode",
   "delCity": "Aflever plaats",
   "delCountryCode": "Aflever landcode",
   "trackTraceCode": "Track and Trace code",
   "trackTraceUrl": "Track and Trace Url",
   "status": "Status"
}',
            ],
            'GET' => [
                'response' => '{
   "shipmentId": "Unieke ID van de zending",
   "debtorNumber": "Debiteurnummer",
   "skuType": "Pallettype of Colli:
PALA, PALB, PALC, COLLI etc.",
   "skuId": "Unieke ID van de SKU",
   "carrier": "Vervoerder",
   "deliveryDate": "Afleverdatum",
   "debtorName": "Afleveradres naam",
   "delAddress": "Afleveradres",
   "delPostcode": "Aflever postcode",
   "delCity": "Aflever plaats",
   "delCountryCode": "Aflever landcode",
   "trackTraceCode": "Track and Trace code",
   "trackTraceUrl": "Track and Trace Url",
   "status": "Status"
}',
            ],
        ],
        'description' => 'Terugkoppeling van de vervoerder hoeveel van welke pallets en colli op een zending gaan.

Technical specification:

URL Specification:

For inserting a shipment the following URL is needed:

    - https://is.dutchfurniturefulfilment.nl/api/sales-order-shipment?apikey={apikey}

Restrictions:

     - The apikey is mandatory and are case sensitive.

To make use of this service you need HTTP Basic authentication (username, password) and an API key, which are provided by De Eekhoorn Woodworkings B.V.',
        'entity' => [
            'PUT' => [
                'request' => '{
   "shipmentId": "Unieke ID van de zending",
   "debtorNumber": "Debiteurnummer",
   "skuType": "Pallettype of Colli:
PALA, PALB, PALC, COLLI etc.",
   "skuId": "Unieke ID van de SKU",
   "carrier": "Vervoerder",
   "deliveryDate": "Afleverdatum",
   "debtorName": "Afleveradres naam",
   "delAddress": "Afleveradres",
   "delPostcode": "Aflever postcode",
   "delCity": "Aflever plaats",
   "delCountryCode": "Aflever landcode",
   "trackTraceCode": "Track and Trace code",
   "trackTraceUrl": "Track and Trace Url",
   "status": "Status"
}',
                'response' => '{
   "shipmentId": "Unieke ID van de zending",
   "debtorNumber": "Debiteurnummer",
   "skuType": "Pallettype of Colli:
PALA, PALB, PALC, COLLI etc.",
   "skuId": "Unieke ID van de SKU",
   "carrier": "Vervoerder",
   "deliveryDate": "Afleverdatum",
   "debtorName": "Afleveradres naam",
   "delAddress": "Afleveradres",
   "delPostcode": "Aflever postcode",
   "delCity": "Aflever plaats",
   "delCountryCode": "Aflever landcode",
   "trackTraceCode": "Track and Trace code",
   "trackTraceUrl": "Track and Trace Url",
   "status": "Status"
}',
            ],
            'GET' => [
                'response' => '{
   "shipmentId": "Unieke ID van de zending",
   "debtorNumber": "Debiteurnummer",
   "skuType": "Pallettype of Colli:
PALA, PALB, PALC, COLLI etc.",
   "skuId": "Unieke ID van de SKU",
   "carrier": "Vervoerder",
   "deliveryDate": "Afleverdatum",
   "debtorName": "Afleveradres naam",
   "delAddress": "Afleveradres",
   "delPostcode": "Aflever postcode",
   "delCity": "Aflever plaats",
   "delCountryCode": "Aflever landcode",
   "trackTraceCode": "Track and Trace code",
   "trackTraceUrl": "Track and Trace Url",
   "status": "Status"
}',
            ],
        ],
    ],
];
