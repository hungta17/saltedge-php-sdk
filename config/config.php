<?php
/**
 * Created by PhpStorm.
 * User: Hung Tran
 * Date: 2017-09-19
 * Time: 3:56 PM
 */

return [
    /*
    |--------------------------------------------------------------------------
    | OAuth
    |--------------------------------------------------------------------------
    */
    'oauth' => [

        /*
        |--------------------------------------------------------------------------
        | Saltedge application authentication
        |--------------------------------------------------------------------------
        |
        | Before using this service, you'll need to register an applicatin via
        | the Saltedge developer website. When setting up your application, take
        | note of the Client-id and Service-secret, as well as the.
        |
        */
        'clientId' => env('SALTEDGE_CLIENT_ID', ''),
        'serviceSecret' => env('SALTEDGE_SERVICE_SECRET', ''),

        /*
        |--------------------------------------------------------------------------
        | Signature
        |--------------------------------------------------------------------------
        |
        | Ensure that you have generated the required private and public rsa keys
        | using the guide provided:
        |
        | https://docs.saltedge.com/guides/signature/
        |
        | Provide the path to the keys on disk or a PEM formatted string
        |
        */
        'rsa_private_key_path' => env('SALTEDGE_PRIVATE_KEY_FILE') ? ('file://'.env('SALTEDGE_PRIVATE_KEY_FILE')): 'file://'.public_path().'private.pem',
        'rsa_private_key_pass' => env('SALTEDGE_PRIVATE_KEY_PASS') ? env('SALTEDGE_PRIVATE_KEY_PASS'): null,
    ],
];
