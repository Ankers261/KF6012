<?php

/**
 * 
 * 
 */

 abstract class Endpoint {

    private $data;
    private $sqlQuery;
    private $sqlParams;

    public function construct() {
        $database = new Database(chiplay.sqlite);

        $this->initialiseSQL();

        $data = $database->executeSQL($this->sqlQuery, $this->sqlParams);

        $this->setData(array(
            //The same pattern of JSON needs to be followed for all endpoints so this needs to be the same as base, actor, film and clienterror
        ));
    }


 }