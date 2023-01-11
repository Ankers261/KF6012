<?php

/**
 * 
 * 
 * 
 * Parent class Endpoint.
 * 
 * Used as a base for all the other endpoints to work from.
 * It is an abstract class as no instances of this class should be made.
 * 
 * @author Jason Ankers - W20004105
 */

 abstract class Endpoint {

    //Variables protected as they should only be used in this class and it's children
    protected $data;
    protected $sqlQuery;
    protected $sqlParams;

    public function __construct() {
        $database = new Database("db/chiplay.sqlite");

        $this->initialiseSQL();

        $this->validateParams($this->validEndpointParams());

        $data = $database->executeSQL($this->sqlQuery, $this->sqlParams);

        $this->noData($data);

        //The same format of this is used throughout the API
        $this->setData(array(
            "length" => count($data),
            "message" => "Successful",
            "dataReturned" => $data
        ));
    }

    protected function setSQL($sql) {
        $this->sqlQuery = $sql;
    }

    protected function getSQL() {
        return $this->sqlQuery;
    }

    protected function setSQLParams($params) {
        $this->sqlParams = $params;
    }

    protected function getSQLParams() {
        return $this->sqlParams;
    }

    protected function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

   //Established here but should be overwritten in each endpoint class
    protected function initialiseSQL() {
        $sql = "";
        $this->setSQL($sql);
        $this->setSQLParams([]);
    }


    //Established here but should be overwritten in each endpoint class
    protected function validEndpointParams() {
        return [];
    }


    /**
     * 
     * This function loops throught each of the valid parameters established in
     * each of the individual endpoint classes and checks if the one searched for
     * matches.
     * 
     */
    protected function validateParams($sqlParams) {
        foreach ($_GET as $key => $value) {
            if(!in_array($key, $sqlParams)) {
                http_response_code(400);
                $output['Message'] = "Invalid query parameter: " . $key;
                die(json_encode($output));
            }
        }
    }

    /**
     * 
     * This function checks if the request made returns data. If it does not
     * it returns a message for the user showing them this.
     * 
     */
    protected function noData($data) {
        if(count($data) == 0) {
            http_response_code(200);
            $output['Message'] = "Your query has returned no data. Try again.";
            die(json_encode($output));
        }
    }
 }