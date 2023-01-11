<?php

use FirebaseJWT\JWT;
use FirebaseJWT\Key;

/**
 * 
 * Endpoint used to update the papers database's paper award status
 * 
 * @author Jason Ankers - W20004105
 * @author John Rooksby
 */
class Update extends Endpoint {

    public function __construct() {

        $this->validateRequestMethod("POST");
        $this->validateToken();
        $this->validateUpdateParams();

        $dbConn = new Database('db/chiplay.sqlite');
        $this->initialiseSQL();
        $queryResult = $dbConn->executeSQL($this->getSQL(), $this->getSQLParams());

        $this->setData(array(
            "length" => 0,
            "message" => "Success",
            "data" => null
        ));
    }


    //Validates the JWT
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

        try {
            $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));
        } catch(Exception $e) {
            throw new ClientErrorException($e->getMessage(), 401);
        }

        if($decoded->iss != $_SERVER['HTTP_HOST']) {
            throw new ClientErrorException("Invalid token issuer", 401);
        }
    }

    //Takes in and filters the paper_id and award JSON data
    private function validateUpdateParams() {
        if (!filter_has_var(INPUT_POST,'paper_id')) {
            throw new ClientErrorException("paper_id parameter required", 400);
        }
        if (!filter_has_var(INPUT_POST,'award')) {
            throw new ClientErrorException("award parameter required", 400);
        }
        $awarded = ['true', null];
        if(!in_array($_POST['award'], $awarded)) {
            throw new ClientErrorException("Invalid award status", 400);
        }
    }

    protected function initialiseSQL() {

        $awardSelected = $_POST['award'];
        $paperSelected = $_POST['paper_id'];

        if ($awardSelected === ""){
            $awardSelected = null;
        }


        $sqlQuery = "UPDATE paper SET award = :award WHERE paper_id = :paper_id";
        $this->setSQL($sqlQuery);
        $this->setSQLParams(['paper_id' => $paperSelected, 'award' => $awardSelected]);
    }
}