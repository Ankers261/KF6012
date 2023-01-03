<?php

/**
 * NEED EXPLAIN HERE
 * 
 * 
 * @author Jason Ankers - W20004105
 */
header("Content-Type: application/json; charset = UTF-8");
header("Access-Control-Allow-Origin: *");

include 'autoloader.php';
spl_autoload_register('autoloader');


if (!in_array($_SERVER['REQUEST_METHOD'], array("GET"))){
    $endpoint= new ClientError("Invalid: " . $_SERVER['REQUEST_METHOD'], 405);
} else {

    $path = parse_url($_SERVER['REQUEST_URI'])['path'];
    $path = str_replace("/webYear3/assignment/api","",$path);

    switch($path) {
        case '/':
            $endpoint = new Base();
            break;
        case '/papers' :
            $endpoint = new Papers();
            break;
        case '/authors':
            $endpoint = new Authors();
            break;
        default:
            $endpoint = new ClientError("Path not found: " . $path, 404);
    }

    $response = $endpoint->getData();
    echo json_encode($response);
    
}
