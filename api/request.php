<?php

/**
 * 
 * 
 * 
 */
class Request {

    private $requestMethod;
    private $path;

    public function __construct() {
        $this->setMethod();
        $this->setPath();
    }

    private function setMethod() {
        $this->requestMethod = $_SERVER['REQUEST_METHOD']; 
    }

    public function validateRequestMethod($validMethods) {
        if(!in_array($this->requestMethod, $validMethods)) {
            $output['Message'] = "Invalid request method: " . $this->requestMethod;
            die(json_encode($output));
        }
    }

    private function setPath() {
        $this->path = parse_url($_SERVER['REQUEST_URI'])['path'];
        $this->path = str_replace("/webYear3/assignment/api", "", $this->path);
    }

    public function getPath() {
        return $this->path;
    }
}