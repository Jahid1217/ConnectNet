<?php
include_once "../model/db.php"; // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new MyDB();
    $conn = $db->conn; // Use the property connection

    // Retrieve form data
    $seller_Id = $_POST['seller_Id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $businessName = $_POST['businessName'];
    $businessType = $_POST['businessType'];
    $location = $_POST['location'];
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : null; // Hash password if provided

    // Update data in the database
    $result = updateSellerData($seller_Id, $name, $email, $username, $phoneNumber, $gender, $businessName, $businessType, $location, $password, $conn);

    if ($result === 1) {
        echo "Information updated successfully.";
        header("Location: ../view/showuser.php"); // Redirect to show user data page
        exit(); // Ensure the script stops after the redirect
    } else {
        echo "Error updating information: " . $result;
    }

    $db->closeCon();
}

// Function to update seller information
function updateSellerData($seller_Id, $name, $email, $username, $phoneNumber, $gender, $businessName, $businessType, $location, $password, $conn) {
    // Base SQL query
    $sql = "UPDATE seller SET name = ?, email = ?, username = ?, phoneNumber = ?, gender = ?, businessName = ?, businessType = ?, location = ?";
    $params = [$name, $email, $username, $phoneNumber, $gender, $businessName, $businessType, $location];

    // Add password to the query only if it's provided
    if (!empty($password)) {
        $sql .= ", password = ?";
        $params[] = $password;
    }

    $sql .= " WHERE seller_Id = ?";
    $params[] = $seller_Id;

    // Prepare and bind the statement
    if ($stmt = $conn->prepare($sql)) {
        $types = str_repeat("s", count($params) - 1) . "i"; // Generate parameter types
        $stmt->bind_param($types, ...$params);

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
