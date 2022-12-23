<?php
/** 
 * Autoloader that takes the classname, converts it to the file name it should be in based on
 * the file naming convention in place and includes it in the index.php file.
 * 
 * It saves manually including each file
 * 
 * @author Jason Ankers - W20004105
 * @author John Rooksby
 */


function autoloader($className) {
    $file = strtolower($className) . ".php";
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if (is_readable($file)) {
        include_once $file;
    } else {
        exit("File cannot be found" . $className . " " . $file);
    }
}

