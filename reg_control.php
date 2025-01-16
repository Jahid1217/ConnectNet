<?php
require_once '../model/db.php';
$myDB = new MyDB();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['seller_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $businessName = $_POST['business_name'];
    $businessType = $_POST['business_type'];
    $location = $_POST['address'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($password === $confirmPassword) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO seller (name, email, phoneNumber, gender, businessName, businessType, location, password) 
                VALUES ('$name', '$email', '$phone', '$gender', '$businessName', '$businessType', '$location', '$hashedPassword')";
        
        if ($myDB->conn->query($sql)) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $myDB->conn->error;
        }
    } else {
        echo "Passwords do not match.";
    }
}
$myDB->closeCon();
?>
