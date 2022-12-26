<?php

/**
 * 
 * 
 * 
 */

class Base extends Endpoint {

    protected function initialiseSQL() {
        $sqlQuery = "SELECT name FROM conference_information"; 
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
    }

    
    public function __construct() {
        $database = new Database("db/chiplay.sqlite");

        $this->initialiseSQL();

        $data = $database->executeSQL($this->sqlQuery, $this->sqlParams);

        $this->setData(array(
            "name" => "Jason Ankers",
            "stuID" => "W20004105",
            "dataReturned" => $data
        ));
    }
    
}