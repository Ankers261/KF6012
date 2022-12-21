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
    $studentInfo = array(
        "firstName" => "Jason",
        "lastName" => "Ankers",
        "studentID" => "W20004105"
    );

    $output = array(
        "student" => $studentInfo,
        "docLink" => "LINK HERE"
    );
}
 echo json_encode($output);
