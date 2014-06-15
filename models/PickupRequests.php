<?php
namespace ShipcloudClient\models;
use ShipcloudClient\api\ApiServiceMapping;

/**
 * Class PickupRequests
 *
 * @package ShipcloudClient\models
 */
class PickupRequests extends BaseModel {

    function __construct() {
        $this->service = ApiServiceMapping::get( __CLASS__ );
    }

    /**
     * Set the carrier you want to use. Possible values are "dhl", "gls", "hermes", "iloxx", "ups".
     * @param string $carrier
     * @return $this
     */
    public function setCarrier( $carrier ) {
        $this->param['carrier'] = (string) $carrier;
        return $this;
    }

    /**
     * Set the pickup date (e.g. 2014/02/12)
     * @param string $pickupDate
     * @return $this
     */
    public function setPickupDate( $pickupDate ) {
        $this->param['pickup_date'] = (string) $pickupDate;
        return $this;
    }
} 