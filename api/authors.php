<?php

/**
 * Authors endpoint.
 * 
 * @author Jason Ankers - W20004105
 */

class Authors extends Endpoint {


    /**
     * Sets the SQL required by the Authors endpoint.
     * 
     * Overrides initialiseSQL function from parent class. 
     * 
     * SQL specifies columns to return alongside joining 
     * the paper_has_author table and the paper table.
     * The purpose of this is not for the information selected directly, 
     * but for the parameters that will alter
     * the data that is returned from the database.
     * 
     */
    protected function initialiseSQL() {
        $sqlQuery = "SELECT author.author_id, first_name, middle_initial, last_name, affiliation.country, affiliation.institution
        FROM author 
        JOIN paper_has_author on (author.author_id = paper_has_author.author_id)
        JOIN paper on (paper_has_author.paper_id = paper.paper_id)
        JOIN affiliation ON (author.author_id = affiliation.author_id)"; 

        $sqlParams = [];

        //Adding parameters to the endpoint query
        if(filter_has_var(INPUT_GET, 'paper_id')) {
            
            if(!filter_var($_GET['paper_id'],FILTER_VALIDATE_INT)) {
                http_response_code(400);
                $output['Message'] = "Paper ID MUST be an integer";
                die(json_encode($output));
            }


            if(isset($sqlWhere)) {
                //If a where clause is already set, another where clause is added so that more than one parameter can be used
                $sqlWhere .= " AND paper.paper_id = :paper_id";
            } else {
                //No where clause is set so only one parameter used
                $sqlWhere = "WHERE paper.paper_id = :paper_id";
            }

            $sqlParams['paper_id'] = $_GET['paper_id'];

            if(isset($sqlWhere)) {
                $sqlQuery .= $sqlWhere;
            }
        }


        $this->setSQL($sqlQuery);
        $this->setSQLParams($sqlParams);
    }

    //Establishes the paramter name array for this endpoint
    protected function validEndpointParams() {
        return ['paper_id'];
    }
}