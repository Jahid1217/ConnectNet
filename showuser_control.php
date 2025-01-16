<?php
include_once "../model/db.php";  // Include the database connection file

// Fetch all users from the database
$db = new MyDB();
$conn = $db->conn;  // Access the connection from the MyDB class

// Fetch the user data (modify the query as needed)
$sql = "SELECT * FROM seller";  // Assuming 'seller' is the table name
$result = $conn->query($sql);

// Fetch the data into an associative array
$users = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

$db->closeCon();  // Close the connection
?>
