<?php
/**
 * 
 * 
 */
use FirebaseJWT\JWT;

class Authenticate extends Endpoint {

    public function __construct() {

        $dbConn = new Database('db/chiplay.sqlite');
        $this -> validateRequestMethod("POST");
        $this ->validateAuthParams();
        $this->initialiseSQL();
        $queryResult = $dbConn->executeSQL($this->getSQL(), $this->getSQlParams());
        $this->validateUsername($queryResult);
        $this->validatePassword($queryResult);

        $data['token'] = $this->createJWT($queryResult);

        $this->setData(array(
            "length" => 0,
            "message" => "Success",
            "dataReturned" => $data
        ));
    }

    protected function initialiseSQL() {
        $sqlQuery = "SELECT account_id, name, username, password FROM account WHERE username = :username";
        $this->setSQL($sqlQuery);
        $this->setSQLParams(['username'=>$_SERVER['PHP_AUTH_USER']]);
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

    private function createJWT($queryResult) {
        $secretKey = SECRET;

        $tokenPayload = [
            'id' => $queryResult[0]['account_id'],
            'username' => $queryResult[0]['username'],
            "iss" => $_SERVER['HTTP_HOST']
        ];

        $jwt = JWT::encode($tokenPayload, $secretKey, 'HS256');

        return $jwt;
    }

    
}