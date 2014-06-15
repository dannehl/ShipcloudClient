ShipcloudClient
===============

Simple curl client for the shipcloud.io RESTful API


## Usage

```
$key = '<your api_key>';
$request = new \ShipcloudClient\Request( $key );

$shipment = new \ShipcloudClient\models\Shipments();
$shipment->setShipmentId( '<shipping_id>' );

// send the the request
$request->getOne( $shipment );
```
