<?php

/**
 * 
 * Connection script for CHIPLAY SQLite database
 * 
 * @author Jason Ankers - W20004105
 * @author John Rooksby
 */

 class Database {

    //Only for use in this class
    private $dbConn;

    public function __construct($dbName) {
        $this->setdbConn($dbName);
    }


    //Uses PDO to establish a connection with the database
    public function setdbConn($dbName) {
        try {
            $this->dbConn = new PDO('sqlite:'.$dbName);
            $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Error connecting to the database: " . $e->getMessage();
            exit();
        }
    }

    //Uses PDO fetch to execute queries from each of the endpoints
    public function executeSQL($sqlQuery, $params = []) {
        $stmt = $this->dbConn->prepare($sqlQuery);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 }