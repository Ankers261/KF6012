<?php


/**
 * 
 * 
 * 
 */
class Update extends Endpoint {

    public function __construct() {

        $this->validateRequestMethod("POST");

        http_response_code(503);

        $this->setData(array(
            "length" => 0,
            "message" => "endpoint building",
            "data" => null
        ));
    }


}