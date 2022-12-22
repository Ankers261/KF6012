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

    private $data;
    private $sqlQuery;
    private $sqlParams;

    public function __construct() {
        $database = new Database(chiplay.sqlite);

        $this->initialiseSQL();

        $data = $database->executeSQL($this->sqlQuery, $this->sqlParams);

        $this->setData(array(
            //The same pattern of JSON needs to be followed for all endpoints so this needs to be the same as base, actor, film and clienterror. Figure this out once
            //You know what kind of information is needed
        ));
    }

    protected function setSQL($sql) {
        $this->sqlQuery = $sql;
    }

    protected function setSQLParams($params) {
        this->SQLParams = $params;
    }

    protected function initialiseSQL() {
        $sql = "";
        this->setSQL($sql);
        $this->setSQLParams([]);
    }

    protected function setData($data) {
        $this->data = $data;
    }

    protected function getData() {
        return $this->data;
    }

 }