<?php
namespace ShipcloudClient;

use ShipcloudClient\api\curl;
use ShipcloudClient\api\httpMethod;

/**
 * Class Request
 *
 * Main request class with common request methods (GET, POST, PUT, DELETE).
 * Load methods with one of the available models to perform a
 * API request.
 *
 * @package ShipcloudClient
 * @version 0.2
 * @author David Dannehl <dannehl@symfly.com>
 */
class Request {

    private $_connection;

    /**
     * Instantiate with a valid API-Key
     * @param null $apiKey
     * @throws \Exception
     */
    function __construct($apiKey = null) {

        if( !is_null($apiKey) ){
            $this->_connection = new curl( $apiKey );
        } else {
            throw new \Exception('Please provide a API key');
        }

    }

    /**
     * Common request which results in a list-response
     * @param $model
     * @return $this
     */
    public function getAll( $model ) {
        return $this->_request( $model, httpMethod::GET);
    }

    /**
     * Common request which results in a single-item-response
     * @param $model
     * @return $this
     */
    public function getOne( $model ) {
        return $this->_request( $model, httpMethod::GET);
    }

    /**
     * Common request which creates data
     * @param $model
     * @return $this
     */
    public function create( $model ) {
        return $this->_request( $model, httpMethod::POST);
    }

    /**
     * Common request which updates data
     * @param $model
     * @return $this
     */
    public function update( $model ) {
        return $this->_request( $model, httpMethod::PUT);
    }

    /**
     * Common request which deletes data
     * @param $model
     * @return $this
     */
    public function delete( $model ) {
        return $this->_request( $model, httpMethod::DELETE);
    }


    /**
     * The actual request!
     * @param $model
     * @param $httpMethod
     * @return $this
     */
    private function _request( $model, $httpMethod) {
        // Send the request and get back the response from the server
        $response = $this->_connection->sendRequest
            (
                $model->getService() . $model->getResource(),
                $model->getParam(),
                $httpMethod
            );

        //@TODO: We need a response handler here!!
        return $response;
    }
}