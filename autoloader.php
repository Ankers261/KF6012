<?php

function autoloader($className) {
    $file = strtolower($className) . ".php";
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if (is_readable($file)) {
        include_once $file;
    } else {
        exit("File cannot be found" . $className . " " . $file);
    }
}

