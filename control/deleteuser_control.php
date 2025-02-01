<?php
include_once "../model/db.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    $db = new MyDB();
    $conn = $db->conn; // Use the database connection

    // Retrieve the seller ID from the form
    $seller_Id = $_POST['seller_id'];

    // Validate seller ID
    if (!is_numeric($seller_Id)) {
        echo "Invalid seller ID.";
        exit();
    }

    // Delete the seller from the database
    $result = deleteDataUser($seller_Id, "seller", $conn);

    if ($result === 1) {
        echo "Seller deleted successfully.";
        header("Location: ../view/showuser.php"); // Redirect to the user listing page
        exit(); // Ensure the script stops after the redirect
    } else {
        echo "Error deleting seller: " . $result;
    }

    $db->closeCon();
}

// Function to delete user from the database
function deleteDataUser($seller_Id, $table, $conn) {
    // SQL query to delete the seller
    $sql = "DELETE FROM $table WHERE seller_Id = ?";

    // Prepare and bind the statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $seller_Id); // Bind the seller ID as an integer

        // Execute the statement
        if ($stmt->execute()) {
            return 1; // Success
        } else {
            return "Error: " . $stmt->error; // Return error message if execution fails
        }

        $stmt->close(); // Close the prepared statement
    } else {
        return "Error preparing the statement: " . $conn->error;
    }
}
?>
