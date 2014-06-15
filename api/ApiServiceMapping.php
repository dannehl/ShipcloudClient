<?php
namespace ShipcloudClient\api;

/**
 * Class ApiServiceMapping
 *
 * @package ShipcloudClient\api
 */
class ApiServiceMapping {

    /**
     * Get the URL from Model Class
     * @param $class
     * @return string
     */
    public static function get( $class ) {
        $class = join('', array_slice(explode('\\', $class), -1));
        switch ( $class ) {
            case 'Shipments':
                return 'shipments/';
            case 'Carriers':
                return 'carriers/';
            case 'Rates':
                return 'rates/';
            case 'PickupRequests':
                return 'pickup_requests/';
            default:
                return '/';
        }
    }

} 