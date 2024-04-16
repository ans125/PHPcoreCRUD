<?php
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "employee_management";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
?>
<!--
class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "employee_management";
    public $conn;

    public function __construct() {
        try {
            $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
        } catch (Exception $e) {
            // Handle the exception, such as logging the error or displaying a user-friendly message
            die("Database connection error: " . $e->getMessage());
        }
    }
}

>
