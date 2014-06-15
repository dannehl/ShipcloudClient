<?php
namespace ShipcloudClient\models;
use ShipcloudClient\api\ApiServiceMapping;

/**
 * Class Rates
 *
 * @package ShipcloudClient\models
 */
class Rates  extends BaseModel {

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
     * Set width of the package in cm
     * @param float $width
     * @return $this
     */
    public function setWidth( $width ) {
        $this->param['width'] = (float) $width;
        return $this;
    }

    /**
     * Set length of the package in cm
     * @param float $length
     * @return $this
     */
    public function setLength( $length ) {
        $this->param['length'] = (float) $length;
        return $this;
    }

    /**
     * Set height of the package in cm
     * @param float $height
     * @return $this
     */
    public function setHeight( $height ) {
        $this->param['height'] = (float) $height;
        return $this;
    }

    /**
     * Set weight in kg
     * @param float $weight
     * @return $this
     */
    public function setWeight( $weight ) {
        $this->param['weight'] = (float) $weight;
        return $this;
    }
} 