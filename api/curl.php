<?php
namespace ShipcloudClient\api;

include __DIR__ . '/api.conf.php';

/**
 * Class curl
 *
 * @package ShipcloudClient\api
 * @version 0.2
 */
class curl {

    private $_apiKey;
    private $_apiUrl;
    private $_contentType = 'application/json; charset=utf-8';

    public function __construct($apiKey, $apiEndpoint = SC_API_ENDPOINT){
        $this->_apiKey = base64_encode( $apiKey );
        $this->_apiUrl = $apiEndpoint;
    }

    /**
     * set the cURL url: combining url-endpoint + action
     * @param $action
     * @return string
     */
    private function _setURL( $action ) {
        $url = $this->_apiUrl .
            SC_API_VERSION .'/'.
            $action;
        return $url;
    }

    /**
     * Set the standard cURl header here
     * @param $action
     * @param $method
     * @return array
     */
    private function _setOpts( $action, $method ) {
        return array(
            CURLOPT_URL => $this->_setURL( $action ),
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_USERAGENT => 'SC-client-php/0.2'
        );
    }

    /**
     * Sends a request to the API
     * @param string $action
     * @param array  $params
     * @param string $method
     * @return array
     */
    public function sendRequest($action = '', $params = array(), $method = 'GET') {

        // Set basic header
        $header[] = "Authorization: Basic ".$this->_apiKey;
        $chOpts = $this->_setOpts( $action, $method );

        // init Curl
        $ch = curl_init();

        if ( $method === 'POST' || $method === 'PUT') {
            if ( is_array($params) ) {
                $data_string = json_encode($params);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                $header[] = 'Content-Type: application/json';
                $header[] = 'Content-Length: ' . strlen($data_string);
            }
        }

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt_array($ch, $chOpts);

        // get the response
        $responseBody = curl_exec($ch);
        $responseInfo = curl_getinfo($ch);

        if ($responseBody === false) {
            $responseBody = array('error' => curl_error($ch));
        }
        curl_close($ch);

        if ($this->_contentType === $responseInfo['content_type']) {
            $responseBody = json_decode($responseBody, true);
        }

        // return the response
        return array(
            'header' => array(
                'request'       => $responseInfo['url'],
                'status'        => $responseInfo['http_code'],
                'request_size'  => $responseInfo['request_size'],
                'total_time'    => $responseInfo['total_time'],
            ),
            'body' => $responseBody
        );
    }
}