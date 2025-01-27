<?php

include "../model/db.php";

session_start();
$hasError = 0;
$userNameError = "";
$passwordError = "";
$termsError = "";
$roleError = "";

// Validate and sanitize the input

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userName = trim($_REQUEST["user_name"] ?? "");
    $password = $_REQUEST["Password"] ?? "";
    $role = $_REQUEST["role"] ?? "";

    $userName = $_REQUEST["user_name"];
    if (empty($userName)) {
        $userNameError = "Please enter a username.";
        $hasError++;
    }

    $password = $_REQUEST["Password"];
    if (empty($password)) {
        $passwordError = "Please enter a password.";
        $hasError++;
    }
    
    if (empty($_REQUEST["terms"])) {
        $termsError = "You must agree to the terms and conditions.";
        
    }
    if (!isset($_REQUEST["terms"])) {
        $termsError = "You must agree to the terms and conditions.";
        
    }
    
    $tableName = "admin";

    if ($hasError == 0) {
        $myDB = new myDB();
        $connectionObject = $myDB->openCon();
    
        $result =$myDB->login($userName, $password, $connectionObject);
    
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $role = $row['role'];
            session_start();
            $_SESSION["user_name"] = $userName;
            switch ($role) {
                case 'admin':
                    header("Location: ../view/home.php");
                    exit();
                case 'employee':
                    header("Location: ../view/showuser.php");
                    exit();
                case 'seller':
                    header("Location: ../view/seller.php");
                    exit();
                default:
                    header("Location: ../view/customer.php");
                    exit();
            }
        } else {
            echo "Invalid username or password";
        }
        $myDB->closeCon($connectionObject);
        // if ($result == 1) {
        //     $_SESSION["user_name"] = $userName;
        //     $_SESSION["Password"] = $password;
        //     header("Location: ../view/home.php");
        //     exit;
        // } else {
        //     echo "Error inserting data into the database.";
        // } 
    }
}

?>