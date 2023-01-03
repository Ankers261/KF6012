<?php

/**
 * Papers endpoint.
 * 
 * @author Jason Ankers - W20004105
 */

class Papers extends Endpoint {


    /**
     * Sets SQL required by paper endpoint.
     * 
     * Overrides initialiseSQL function from parent class. 
     * 
     * SQL specifies columns to return alongside joining the track table. 
     * The track table is used both in the initial query and as a parameter.
     */
    protected function initialiseSQL() {
        $sqlQuery = "SELECT paper_id, title, award, 
        abstract, track.name AS track_name, track.short_name AS sName
        FROM paper JOIN track on (paper.track_id = track.track_id)";

        $sqlParams = [];

        if (filter_has_var(INPUT_GET, 'track')) {
            if(isset($sqlWhere)) {
                //If a where clause is already set, another where clause is added so that more than one parameter can be used
                $sqlWhere .= " AND sName = :track"; 
            } else {
                //No where clause is set so only one parameter used
                $sqlWhere = " WHERE sName = :track";
            }
            
            $sqlParams['track'] = $_GET['track'];
        } 

        if(isset($sqlWhere)) {
            $sqlQuery .= $sqlWhere;
        } 

        $this->setSQL($sqlQuery);
        $this->setSQLParams($sqlParams);
    }

    //Establishes the paramter name array for this endpoint
    protected function validEndpointParams() {
        return ['track'];
    }
}