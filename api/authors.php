<?php

/**
 * 
 * 
 * 
 */

class Authors extends Endpoint {


    protected function initialiseSQL() {
        $sqlQuery = "SELECT author.author_id, first_name, middle_initial, last_name
        FROM author 
        JOIN paper_has_author on (author.author_id = paper_has_author.author_id)
        JOIN paper on (paper_has_author.paper_id = paper.paper_id)"; 

        $sqlParams = [];

        if(filter_has_var(INPUT_GET, 'paper_id')) {
            
            if(!filter_var($_GET['paper_id'],FILTER_VALIDATE_INT)) {
                http_response_code(400);
                $output['Message'] = "Paper ID MUST be an integer";
                die(json_encode($output));
            }


            if(isset($sqlWhere)) {
                $sqlWhere .= " AND paper.paper_id = :paper_id";
            } else {
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

    protected function validEndpointParams() {
        return ['paper_id'];
    }
}