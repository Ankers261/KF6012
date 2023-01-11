<?php

/**
 * Index page of the API.
 * 
 * Sets the headers for the API
 * Adds the autoloader for the API to load the rest of the PHP files
 * Checks the request method to make sure it is GET
 * Provides access to the different API endpoints
 * Encodes the JSON data from each enpoint and displays it
 * 
 * 
 * @author Jason Ankers - W20004105
 */
header("Content-Type: application/json; charset = UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {    
    exit(0);
} 

define('SECRET', "n<u~xNPiUns@g4X");

include 'autoloader.php';
spl_autoload_register('autoloader');

include 'exceptionhandler.php';
set_exception_handler('exceptionhandler');


if (!in_array($_SERVER['REQUEST_METHOD'], array("GET", "POST"))){
    $endpoint= new ClientError("Invalid: " . $_SERVER['REQUEST_METHOD'], 405);
} else {

$path = parse_url($_SERVER['REQUEST_URI'])['path'];
$path = str_replace("/webYear3/assignment/api","",$path);

//Only used one endpoint case for each endpoint for ease
try {
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
        case '/authenticate':
            $endpoint = new Authenticate();
            break;
        case '/update':
            $endpoint = new Update();
            break;
        default:
            $endpoint = new ClientError("Path not found: " . $path, 404);
    } 
} catch(ClientErrorException $e) {
        $endpoint = new ClientError($e->getMessage(), $e->getCode());
    }

$response = $endpoint->getData();
echo json_encode($response);
    
}
