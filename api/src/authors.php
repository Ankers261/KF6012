<?php

/**
 * 
 * 
 * 
 */

class Authors extends Endpoint {


    protected function initialiseSQL() {
        $sqlQuery = "SELECT author_id, first_name, middle_initial, last_name
        FROM author"; //SQL correct for now but will need a join to allow for paramters from paper table
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
    }
}