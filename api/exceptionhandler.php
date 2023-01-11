<?php
 
/**
 * 
 * Handles custom exceptions
 * 
 * @author - John Rooksby
 */

function exceptionHandler($e) {
    http_response_code(500);
    $output['message'] = $e->getMessage();
    $output['location']['file'] = $e->getFile();
    $output['location']['line'] = $e->getLine();
    echo json_encode($output);
}