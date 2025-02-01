<?php
require_once '../model/db.php'; // Include database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username']; // Added username field
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt password
    $inst_address = $_POST['inst_address']; // Updated field name

    // Handle profile picture upload (Optional)
    $profile_picture = ""; // Default empty string if no file is uploaded
    if (!empty($_FILES['profile_picture']['name'])) {
        $upload_dir = '../uploads/';
        $profile_picture = $upload_dir . basename($_FILES['profile_picture']['name']);
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profile_picture);
    }

    $db = new MyDB(); // Create MyDB object
    $conn = $db->conn; // Access the connection property directly

    if ($conn) {
        $sql = "INSERT INTO customer (name, email, phone, username, password, inst_address, picture)
                VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssss", $name, $email, $phone, $username, $password, $inst_address, $profile_picture);

        if ($stmt->execute()) {
            $customer_Id = $stmt->insert_id; // Get the last inserted customer ID
            echo '<div style="text-align:center; margin-top: 20px;">
                    <h2 style="color: green;">Registration Successful!</h2>
                  </div>';

            echo '<div class="buttons-container" style="display: flex; justify-content: center; gap: 15px; margin-top: 20px;">
                    <form action="../view/showcustomer.php" method="get">
                        <button type="submit" style="background-color: blue; color: white; padding: 10px 20px; border-radius: 10px; border: none; cursor: pointer;">View Customers</button>
                    </form>
                    <form action="../view/specific_customer.php" method="get">
                        <input type="hidden" name="customer_Id" value="' . $customer_Id . '">
                        <button type="submit" style="background-color: green; color: white; padding: 10px 20px; border-radius: 10px; border: none; cursor: pointer;">View My Details</button>
                    </form>
                  </div>';
        } else {
            echo '<div style="text-align:center; color: red;">Error: ' . $stmt->error . '</div>';
        }

        $stmt->close();
        $db->closeCon(); // Close the connection
    } else {
        echo '<div style="text-align:center; color: red;">Database connection failed!</div>';
    }
} else {
    echo '<div style="text-align:center; color: red;">Invalid request method!</div>';
}
?>
<head>
<link rel="stylesheet" href="../css/mystyle.css"> <!-- External CSS for styling -->
</head>