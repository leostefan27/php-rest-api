<?php
class Database {
    // Database params
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $conn;


    function connect() {
        $this->conn = null;

        // Connect to database
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->username, $this->password);

            // Set attribute
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo("Error connection to database " . $e->getMessage());
        }
        
        return $this->conn;
    }

}