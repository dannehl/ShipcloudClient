<?php
namespace ShipcloudClient\models;

/**
 * Class BaseModel
 *
 * @package ShipcloudClient\models
 */
class BaseModel {

    protected $service;
    protected $resource;
    protected $param = array();


    /**
     * Get the service
     * @return mixed
     */
    public function getService() {
        return $this->service;
    }

    /**
     * Get the resource
     * @return mixed
     */
    public function getResource() {
        return $this->resource;
    }

    /**
     * Get the params (array)
     * @return array
     */
    public function getParam() {
        return $this->param;
    }

} 