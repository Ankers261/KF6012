<?php

/**
 * 
 * 
 * 
 */

class Base extends Endpoint {


    protected function initialiseSQL() {
        $sqlQuery = ""; //SQL for retreiving specific imformation on the Base endpoint goes here
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
    }
}