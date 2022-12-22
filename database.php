<?php

/**
 * 
 * Connection script for CHIPlAY SQLite database
 * 
 * @author Jason Ankers - W20004105
 */

 class Database {

    private $dbConn;

    public function __construct($dbName) {
        $this->setdbConn($dbName);
    }

    /**
     * 
     */

    private function setdbConn($dbName) {
        try {
            $this->dbConn = new PDO('sqlite:'.$dbName);
            $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage();
            exit();
        }
    }

    
 }