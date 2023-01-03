<?php

/**
 * 
 * 
 * 
 * Parent class Endpoint which is used as a base for all the other endpoints to work from.
 * It is an abstract class as no instances of this class should be made.
 * 
 * @author Jason Ankers - W20004105
 */

 abstract class Endpoint {

    protected $data;
    protected $sqlQuery;
    protected $sqlParams;

    public function __construct() {
        $database = new Database("db/chiplay.sqlite");

        $this->initialiseSQL();

        $this->validateParams($this->validEndpointParams());


        $data = $database->executeSQL($this->sqlQuery, $this->sqlParams);

        $this->noData($data);

        $this->setData(array(
            "length" => count($data),
            "message" => "Successful",
            "dataReturned" => $data
        ));
    }

    protected function setSQL($sql) {
        $this->sqlQuery = $sql;
    }

    protected function setSQLParams($params) {
        $this->sqlParams = $params;
    }

    protected function setData($data) {
        $this->data = $data;
    }

    public function getData() {
        return $this->data;
    }

   
    protected function initialiseSQL() {
        $sql = "";
        $this->setSQL($sql);
        $this->setSQLParams([]);
    }


    /**
     * 
     * 
     */
    protected function validEndpointParams() {
        return [];
    }


    /**
     * 
     * 
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
     * 
     * 
     */
    protected function noData($data) {
        if(count($data) == 0) {
            http_response_code(400);
            $output['Message'] = "Your query has returned no data. Try again.";
            die(json_encode($output));
        }
    }
 }