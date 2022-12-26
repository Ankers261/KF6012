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

        $student = array(
            "name" => "Jason Ankers",
            "stuID" => "W20004105"
        );

        $this->setData(array(
            "student" => $student,
            "docLink" => "LINK HERE",
            "dataReturned" => $data
        ));
    }
    
}