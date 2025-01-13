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
    $role = $_REQUEST["role"];
    if (empty($_REQUEST["role"])) {
        $roleError = "Please select a role.";
        $hasError++;
    }


    if (!isset($_REQUEST["terms"])) {
        $termsError = "You must agree to the terms and conditions.";
        
    }
    
    if ($hasError == 0) {
        
        $tableName = "admin";
        $myDB = new myDB();
        $connectionObject = $myDB->openCon();

        $result = $myDB->login($userName, $password, $role, $tableName, $connectionObject);

        $myDB->closeCon($connectionObject);

        if ($result == 1) {
            $_SESSION["user_name"] = $userName;
            $_SESSION["Password"] = $password;
            header("Location: ../view/home.php");
            exit;
        } else {
            echo "Error inserting data into the database.";
        }
        
        
    }
}

?>