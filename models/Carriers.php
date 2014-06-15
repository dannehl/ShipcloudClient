<?php
namespace ShipcloudClient\models;
use ShipcloudClient\api\ApiServiceMapping;

/**
 * Class Carriers
 *
 * @package ShipcloudClient\models
 */
class Carriers  extends BaseModel {

    function __construct() {
        $this->service = ApiServiceMapping::get( __CLASS__ );
    }

} 