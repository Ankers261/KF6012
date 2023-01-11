<?php

use FirebaseJWT\JWT;
use FirebaseJWT\Key;

/**
 * 
 * 
 * 
 */
class Update extends Endpoint {

    public function __construct() {

        $this->validateRequestMethod("POST");
        $this->validateToken();

        http_response_code(503);

        $this->setData(array(
            "length" => 0,
            "message" => "endpoint building",
            "data" => null
        ));
    }


    private function validateToken() {
        $secretKey = SECRET;

        $allHeaders = getallheaders();
        $authorizationHeader = "";

        //Checking for capitalisation
        if (array_key_exists('Authorization', $allHeaders)) {
            $authorizationHeader = $allHeaders['Authorization'];
        } elseif (array_key_exists('authorization', $allHeaders)) {
            $authorizationHeader = $allHeaders['authorization'];
        }

        //Checking for bearer token - will be thrown if authorizationHeader is blank
        if (substr($authorizationHeader, 0, 7) != 'Bearer ') {
            throw new ClientErrorException("Bearer token required", 401);
        }

        $jwt = trim(substr($authorizationHeader, 7));

        $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
    }
}