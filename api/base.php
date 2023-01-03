<?php

/**
 * Base endpoint
 * 
 * Unlinke other endpoint classes, this has to 
 * override the Endpoint class constructor to
 * be able to hardcode some necessary data.
 * 
 * @author Jason Ankers - W20004105
 */

class Base extends Endpoint {

    protected function initialiseSQL() {
        $sqlQuery = "SELECT name FROM conference_information"; 
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
    }

    //Overriding the constructor of Endpoint class
    public function __construct() {
        $database = new Database("db/chiplay.sqlite");

        $this->initialiseSQL();

        $data = $database->executeSQL($this->sqlQuery, $this->sqlParams);

        //Hardcoded student data
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