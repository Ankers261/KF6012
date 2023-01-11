<?php

/**
 * 
 * 
 */

class Authenticate extends Endpoint {

    public function __construct() {

        $dbConn = new Database('db/chiplay.sqlite');
        $this -> validateRequestMethod("POST");
        $this ->validateAuthParams();
        $this->initialiseSQL();
        $queryResult = $dbConn->executeSQL($this->getSQL(), $this->getSQlParams());
        $this->validateUsername($queryResult);
        $this->validatePassword($queryResult);

        http_response_code(503);

        $this->setData(array(
            "length" => 0,
            "message" => "endpoint under construction",
            "dataReturned" => $queryResult
        ));
    }

    private function validateRequestMethod($method) {
        if ($_SERVER['REQUEST_METHOD'] != $method) {
            throw new ClientErrorException("Invalid request method", 405);
        }
    }

    private function validateAuthParams() {
        if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {

            throw new ClientErrorException("Username and password required", 401);
        }
    }

    private function validateUsername($data) {
        if (count($data)<1) {
            throw new ClientErrorException("Invalid credentials", 401);
        }
    }

    private function validatePassword($data) {
        if (!password_verify($_SERVER['PHP_AUTH_PW'], $data[0]['password'])) {
            throw new ClientErrorException("Invalid credentials", 401);
        }
    }

    protected function initialiseSQL() {
        $sqlQuery = "SELECT account_id, name, username, password FROM account WHERE username = :username";
        $this->setSQL($sqlQuery);
        $this->setSQLParams(['username'=>$_SERVER['PHP_AUTH_USER']]);
    }
}