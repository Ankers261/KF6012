<?php

/**
 * 
 * 
 * 
 */

class Base extends Endpoint {


    //THIS CLASS WILL BE DIFFERENT AS IT RETURNS THE HARD CODED DATA CURRENTLY IN THE INDEX FILE
    // MOVE THIS DATA FROM THE INDEX FILE TO THIS ONE BY QUERYING THE DATABASE FOR THE FILM TITLE USING THE FUNCTION BELOW
    //THEN FOLLOWING THE SAME PATTERN FROM THE ENDPOINT.PHP FILE's setData function, RETURN THE JSON DATA. I UNDERSTOOD HOW TO DO THIS LAST NIGHT 
    //SO GOOD LUCK HOPEFULLY YOU CAN FIGURE IT OUT HAHA
    protected function initialiseSQL() {
        $sqlQuery = ""; //SQL for retreiving specific imformation on the Base endpoint goes here
        $this->setSQL($sqlQuery);
        $this->setSQLParams([]);
        
        //ONCE DB CONNECTION IS MADE, TAKE THE CONFERENCE NAME FROM THE DATABSE USING THE FOLLOWING SQL
        //"SELECT name FROM conference_information"
    }
}