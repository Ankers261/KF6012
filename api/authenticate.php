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
            die(json_encode(array(
                "message" => "invalid reuqest method"
            )));
        }
    }

    private function validateAuthParams() {
        if(!isset($_POST['username']) || !isset($_POST['password'])) {
            die(json_encode(array(
                "message" => "username and password required"
            )));
        }
    }

    private function validateUsername($data) {
        if (count($data)<1) {
            die(json_encode(array(
                "message" => "invalid credentials"
            )));
        }
    }

    private function validatePassword($data) {
        if (!password_verify($_POST['password'], $data[0]['password'])) {
            die(json_encode(array(
                "message" => "invalid credentials"
            )));
        }
    }

    protected function initialiseSQL() {
        $sqlQuery = "SELECT account_id, name, username, password FROM account WHERE username = :username";
        $this->setSQL($sqlQuery);
        $this->setSQLParams(['username'=>$_POST['username']]);
    }
}