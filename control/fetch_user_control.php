<?php
require_once "../model/db.php";

// Set the Content-Type to application/json
header('Content-Type: application/json');

// Validate the request
if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET['seller_Id']) && isset($_GET['name'])) {
    $seller_Id = $_GET['seller_Id'];
    $name = $_GET['name'];

    $db = new MyDB();
    $conn = $db->conn;

    // Prepare and execute the SQL query
    $sql = "SELECT * FROM seller WHERE seller_Id = ? AND name = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("is", $seller_Id, $name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo json_encode(["status" => "success", "data" => $user]);
        } else {
            echo json_encode(["status" => "error", "message" => "User not found."]);
        }

        $stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "Failed to prepare SQL statement."]);
    }

    $db->closeCon();
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request."]);
}
