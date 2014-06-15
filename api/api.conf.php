<?php

/** SET the mode */
define('SC_API_PRODUCTION_MODE', true);



if ( SC_API_PRODUCTION_MODE ) {

    define('SC_API_ENDPOINT',   'https://api.shipcloud.io/');
    define('SC_API_VERSION',    'v1');

} else {

    define('SC_API_ENDPOINT',   'https://api.shipcloud.io/');
    define('SC_API_VERSION',    'v1');

}