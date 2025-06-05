<?php

class Database {
    private static $instance = null;
    private $connection;

    private $host = 'mysql_db';
    private $user = 'root';
    private $pass = 'toor';
    private $name = 'Catalog';

    // The constructor is private to prevent creating new instances
    private function __construct() {
        $this->connection = new mysqli($this->host, $this->user, $this->pass, $this->name);

        if ($this->connection->connect_error) {
            die("Nu s-a putut realiza conexiunea: " . $this->connection->connect_error);
        }
    }

    // The single entry point to get the instance of the database connection
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Method to get the raw connection object for queries
    public function getConnection() {
        return $this->connection;
    }
}
?>
