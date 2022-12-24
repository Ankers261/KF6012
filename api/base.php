<?php

/**
 * 
 * 
 * 
 */

class Base extends Endpoint {

        $hardcodedData = array(
            "fName" => "Jason",
            "sName" => "Ankers",
            "studentID" => "W20004105",
            "docPage" => "LINK HERE"
        );

        protected function initialiseSQL() {
            $sqlQuery = "SELECT name FROM conference_information"; //SQL correct for now but will need a join to allow for paramters from paper table
            $this->setSQL($sqlQuery);
            $this->setSQLParams([]);
        }

}