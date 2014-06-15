<?php
namespace ShipcloudClient\models;
use ShipcloudClient\api\ApiServiceMapping;

/**
 * Class Shipments
 *
 * @package Shipcloud\models
 */
class Shipments  extends BaseModel {

    function __construct() {
        $this->service = ApiServiceMapping::get( __CLASS__ );
    }


    /**
     * Set the shipment id. Needed for GET, PUT, DELETE requests
     * @param $id
     * @internal param mixed $prodId
     * @return $this
     */
    public function setShipmentId($id) {
        $this->resource = $id;
        return $this;
    }

    /**
     * Set the carrier (dhl, gls, hermes, iloxx, ups). For a valid list
     * please run the model "Carrier" first to get all possible carriers from
     * shipcloud.io
     * @param string $carrier
     * @return $this
     */
    public function setCarrier( $carrier ) {
        $this->param['carrier'] = (string) $carrier;
        return $this;
    }

    /**
     * Set the receivers address. Expects an array. For available
     * fields visit the API-Documentation at http://docs.shipcloud.apiary.io/#shipmentresources
     * @param array $to
     * @return $this
     */
    public function setTo( $to = array() ) {
        $this->param['to'] = $to;
        return $this;
    }

    /**
     * Set the senders address. Expects an array. For available
     * fields visit the API-Documentation at http://docs.shipcloud.apiary.io/#shipmentresources
     * @param array $from
     * @return $this
     */
    public function setFrom( $from = array() ) {
        $this->param['from'] = $from;
        return $this;
    }

    /**
     * Set the package details. Expects an array. For available
     * fields visit the API-Documentation at http://docs.shipcloud.apiary.io/#shipmentresources
     * @param array $package
     * @return $this
     */
    public function setPackage( $package = array() ) {
        $this->param['package'] = $package;
        return $this;
    }

    /**
     * Set the service. Optional parameter. Available values are:
     * 'returns', 'standard', 'one_day', 'one_day_early'; default is 'standard'
     * @param string $service
     * @return $this
     */
    public function setService( $service ) {
        $this->param['service'] = (string) $service;
        return $this;
    }

    /**
     * Set the reference. Optional parameter, max 30 characters
     * @param string $referenceNumber
     * @return $this
     */
    public function setReferenceNumber( $referenceNumber ) {
        $this->param['reference_number'] = (string) $referenceNumber;
        return $this;
    }

    /**
     * Determines if a shipping label should be created at the carrier.
     * You will be charged!
     * @param boolean $createShippingLabel
     * @return $this
     */
    public function setCreateShippingLabel( $createShippingLabel ) {
        $this->param['create_shipping_label'] = (bool) $createShippingLabel;
        return $this;
    }


} 