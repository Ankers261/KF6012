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

        $data = $database->executeSQL($this->sqlQuery, $this->sqlParams);

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
        $this->SQLParams = $params;
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
 }