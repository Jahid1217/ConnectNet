<?php
require_once '../model/db.php';

$myDB = new MyDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : null;
    $phoneNumber = $_POST['phoneNumber'];
    $businessName = $_POST['businessName'];
    $businessType = $_POST['businessType'];
    $location = $_POST['location'];
    $role = $_POST['role']; // Default is 'seller'

    // Validate that required fields are not empty
    if (empty($name) || empty($email) || empty($username) || empty($password) || empty($confirmPassword) || empty($gender)) {
        echo "All required fields must be filled.";
        exit;
    }

    // Validate password match
    if ($password === $confirmPassword) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute the SQL query
        $sql = "INSERT INTO seller (name, email, username, password, role, gender, phoneNumber, businessName, businessType, location) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $myDB->conn->prepare($sql);
        $stmt->bind_param(
            "ssssssssss",
            $name, $email, $username, $hashedPassword, $role, $gender, $phoneNumber, $businessName, $businessType, $location
        );

        if ($stmt->execute()) {
            // Display the information entered by the user
            //echo "<h1>Welcome</h1>";
            echo "<h1 style='color: peru; font-size: 2.5em; text-shadow: 2px 2px 4px rgba(0, 0, 0, 1);'>Welcome, $name</h1>";
            echo "<table border='1'>";
            echo "<tr><th>Full Name</th><td>{$name}</td></tr>";
            echo "<tr><th>Email</th><td>{$email}</td></tr>";
            echo "<tr><th>Username</th><td>{$username}</td></tr>";
            echo "<tr><th>Gender</th><td>{$gender}</td></tr>";
            echo "<tr><th>Phone Number</th><td>{$phoneNumber}</td></tr>";
            echo "<tr><th>Business Name</th><td>{$businessName}</td></tr>";
            echo "<tr><th>Business Type</th><td>{$businessType}</td></tr>";
            echo "<tr><th>Location</th><td>{$location}</td></tr>";
            echo "</table>";

            // Add service button
            echo "<form action='../view/add_service.php' method='GET'>";
            echo "<input type='hidden' name='seller_Id' value='{$stmt->insert_id}'>"; // Passing seller ID
            echo "<button type='submit'>Add Services</button>";
            echo "</form>";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Passwords do not match.";
    }
}

$myDB->closeCon();
?>
<head>
    <link rel="stylesheet" href="../css/mycss.css">
</head>