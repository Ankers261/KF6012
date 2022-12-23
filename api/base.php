<?php

/**
 * 
 * 
 * 
 */

class Base extends Endpoint {

    //RETHINK HOW THIS CLASS WORKS AS IT SHOULDNT HAVE TO OVERWRITE CONSTRUCTOR
    //ACTUALLY THIS DOESNT WORK SO DEFINITELY NEEDS RETHINKING
    private $data;
    private $sqlQuery;
    private $sqlParams;

    public function __construct() {

        //Hardcoding student information
        $studentInfo = array(
            "firstName" => "Jason",
            "lastName" => "Ankers",
            "studentID" => "W20004105"
        );

        //Hardcoding documentation
        $base = array(
            "student" => $studentInfo,
            "docLink" => "LINK HERE FOR DOCUMENTATION PAGE" // This can be hardcoded - It will be created as part of TASK 4 so come back to this
        );
        
        $database = new Database("db/chiplay.sqlite");

        $this->initialiseSQL();

        $data = $database->executeSQL($this->sqlQuery, $this->sqlParams);

        //Combining SQL query for conference name with hardcoded data
        $baseData = array(
            "student" => $base,
            "data" => $data
        );

        $this->setData(array(
            "length" => count($baseData),
            "message" => "Successful",
            "dataReturned" => $baseData
        ));
    }

    protected function initialiseSQL() {
        $sqlQuery = "SELECT name FROM conference_information";
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
        
    }
}