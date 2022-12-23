<?php

/**
 * 
 * 
 * 
 */

class Authors extends Endpoint {


    protected function initialiseSQL() {
        $sqlQuery = ""; //SQL for retreiving specific imformation on the authors endpoint goes here
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
    }
}