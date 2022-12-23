<?php

/**
 * Papers endpoint
 * 
 * @Author Jason Ankers - W20004105
 */

class Papers extends Endpoint {


    protected function initialiseSQL() {
        $sqlQuery = "SELECT paper_id, title, award, 
        abstract, name AS track_name, short_name AS sName
        FROM paper JOIN track"; //SQL for retreiving specific imformation on the papers endpoint goes here
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
    }
}