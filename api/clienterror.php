<?php
/**
 * Handles client errors
 * 
 * Child of Endpoint class as it is an endpoint that deals with errors e.g. 404, 405.
 * 
 * @author Jason Ankers - w20004105
 * @author John Rooksby
 */

class ClientError extends Endpoint {
    public function __construct($message = "", $code = 400) {
        http_response_code($code);

        $this->setData(array(
            "code" => $code,
            "message" => $message,
            "dataReturned" => null
        ));
    }
}