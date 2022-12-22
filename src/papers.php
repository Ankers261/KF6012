<?php

/**
 * 
 * 
 * 
 */

class Papers extends Endpoint {


    protected function initialiseSQL() {
        $sqlQuery = ""; //SQL for retreiving specific imformation on the papers endpoint goes here
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
    }
}