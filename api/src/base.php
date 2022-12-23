<?php

/**
 * 
 * 
 * 
 */

class Base extends Endpoint {


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

    protected function initialiseSQL() {
        $sqlQuery = "";
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
        
        //ONCE DB CONNECTION IS MADE, TAKE THE CONFERENCE NAME FROM THE DATABSE USING THE FOLLOWING SQL
        //"SELECT name FROM conference_information"
    }
}