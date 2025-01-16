<?php
class MyDB {
    // Database connection credentials
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'connectnet';

    // Create a connection property
    public $conn;

    // Constructor to open the connection
    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to close the connection
    public function closeCon() {
        $this->conn->close();
    }

    // Method to fetch user data by ID (example)
    public function getUserByID($tableName, $conn, $id) {
        $sql = "SELECT * FROM $tableName WHERE seller_Id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
    
}
?>
