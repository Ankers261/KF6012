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

        $sqlParams = [];

        if (filter_has_var(INPUT_GET, 'track')) {
            if(isset($sqlWhere)) {
                $sqlWhere .= " AND sName = :track"; //If where is already set, another where is set so more than 1 track can be returned
            } else {
                $sqlWhere = " WHERE sName = :track";//No where is set so 1 track name will be returned
            }
            
            $sqlParams['track'] = $_GET['track'];
        } 

        if(isset($sqlWhere)) {
            $sqlQuery .= $sqlWhere;
        } 

        $this->setSQL($sqlQuery);
        $this->setSQLParams($sqlParams);
    }

    protected function validEndpointParams() {
        return ['track'];
    }
}