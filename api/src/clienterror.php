<?php
/**
 * Handles client errors
 * Child of Endpoint class as it is an endpoint that deals with errors e.g. 404, 405.
 */

class ClientError extends Endpoint {
    public function __construct($message = "", $code = 400) {
        http_response_code($code);

        $this->setData(array(
            "length" => 0,
            "message" => $message,
            "dataReturned" => null
        ));
    }
}