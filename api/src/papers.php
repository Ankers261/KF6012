<?php

/**
 * Papers endpoint
 * 
 * @Author Jason Ankers - W20004105
 */

class Papers extends Endpoint {


    protected function initialiseSQL() {
        $sqlQuery = "SELECT paper_id, title, award, 
        abstract, track.name AS track_name, track.short_name AS sName
        FROM paper JOIN track on (paper.track_id = track.track_id)"; //SQL for retreiving specific imformation on the papers endpoint goes here
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
    }
}