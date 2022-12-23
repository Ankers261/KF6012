<?php

/**
 * NEED EXPLAIN HERE
 * 
 * 
 * @author Jason Ankers - W20004105
 */
header("Content-Type: application/json; charset = UTF-8");
header("Access-Control-Allow-Origin: *");

if (!in_array($_SERVER['REQUEST_METHOD'], array("GET"))){
    http_response_code(405);
    $output['message'] = "Invalid: " . $_SERVER['REQUEST_METHOD'];
} else {

    //The stuff currently here needs to be put into the base class later on as this is what will be returned with the base class
    $studentInfo = array(
        "firstName" => "Jason",
        "lastName" => "Ankers",
        "studentID" => "W20004105"
    );

    $output = array(
        "student" => $studentInfo,
        "docLink" => "LINK HERE FOR DOCUMENTATION PAGE" // This can be hardcoded - It will be created as part of TASK 4 so come back to this
    );

    
}
 echo json_encode($output);
