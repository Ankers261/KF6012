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
                $sqlWhere .= " AND track.short_name LIKE :track"; //If where is already set, another where is set so more than 1 track can be returned
            } else {
                $sqlWhere = " WHERE track.short_name LIKE :track";//No where is set so 1 track name will be returned
            }
            
            $sqlParams['track'] = $_GET['track'];
        } else {
            echo "NOPE";
        }

        if(isset($sqlWhere)) {
            $sqlQuery .= $sqlWhere; //SO FAR THIS IS WHERE THE 
                                    //PROGRAM GETS TO AND QUERY IS AS 
                                    //EXPECTED THEREFORE IT IS SOMETHING WRONG WITH AFTER THIS
        } else {
            echo "NONO";
        }



        $this->setSQL($sqlQuery);
        $this->setSQLParams($sqlParams);


    }
}