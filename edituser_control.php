<?php
include_once "../model/db.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new MyDB();
    $conn = $db->conn; // Use the property connection

    // Retrieve form data
    $seller_Id = $_POST['seller_Id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $business_name = $_POST['business_name'];
    $business_type = $_POST['business_type'];
    $location = $_POST['location'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure password storage

    // Update data in the database
    $result = updateDataUser($seller_Id, $name, $email, $phone, $gender, $business_name, $business_type, $location, $password, "seller", $conn);

    if ($result === 1) {
        echo "Information updated successfully.";
        header("Location: ../view/showuser.php"); // Redirect to show user data page
        exit(); // Ensure the script stops after the redirect
    } else {
        echo "Error updating information: " . $result;
    }

    $db->closeCon();
}

// Function to update user information
function updateDataUser($seller_Id, $name, $email, $phone, $gender, $business_name, $business_type, $location, $password, $table, $conn) {
    // SQL query to update user information
    $sql = "UPDATE $table SET name = ?, email = ?, phoneNumber = ?, gender = ?, businessName = ?, businessType = ?, location = ?, password = ? WHERE seller_Id = ?";

    // Prepare and bind the statement
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssssssi", $name, $email, $phone, $gender, $business_name, $business_type, $location, $password, $seller_Id);

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
