<?php
require "../database/db.php";

$FullNameError = "";
$emailError = "";
$phoneNoError = "";
$BirthDateError = "";
$divisionError = "";
$districtError = "";
$roleError = "";
$departmentError = "";
$usernameError = "";
$passwordError = "";
$confirmPasswordError = "";
$emptypeError = "";
$supervisorError = "";
$termsError = "";
$fileError= "";

$hasError = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $FullName = trim($_POST["FullName"]);
    $Email = trim($_POST["Email"]);
    $PhoneNo = trim($_POST["PhoneNo"]);
    $BirthDate = $_POST["BirthDate"];
    $Division = $_POST["Division"];
    $District = $_POST["District"];
    $Role = $_POST["Role"];
    $Department = $_POST["Department"];
    $UserName = trim($_POST["UserName"]);
    $Password = $_POST["Password"];
    $ConfirmPassword = $_POST["Confirm_Password"];
    $Emptype = $_POST["Emptype"] ?? "";
    $Supervisor = trim($_POST["Supervisor"]);
    $terms = isset($_POST["terms"]);
    $myfile= $_POST["file"];

    // Name validation
    if (empty($FullName)) {
        $FullNameError = "Please enter your full name.";
        $hasError++;
    } elseif (strlen($FullName) < 4) {
        $FullNameError = "Full name must be at least 4 characters.";
        $hasError++;
    }

    // Email validation
    if (empty($Email)) {
        $emailError = "Email is required.";
        $hasError++;
    } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Invalid email format.";
        $hasError++;
    } 

    // Phone number validation
    if (empty($PhoneNo)) {
        $phoneNoError = "Phone number is required.";
        $hasError++;
    } elseif (!ctype_digit($PhoneNo)) {
        $phoneNoError = "Phone number must contain only digits.";
        $hasError++;
    }

    // Date of Birth validation
    if (empty($BirthDate)) {
        $BirthDateError = "Please enter your date of birth.";
        $hasError++;
    }

    // Address validation
    if (empty($Division)) {
        $divisionError = "Please select a division.";
        $hasError++;
    }
    if (empty($District)) {
        $districtError = "Please select a district.";
        $hasError++;
    }

    // Role validation
    if (empty($Role)) {
        $roleError = "Please select a role.";
        $hasError++;
    }

    // Department validation
    if (empty($Department)) {
        $departmentError = "Please select a department.";
        $hasError++;
    }

    // Username validation
    if (empty($UserName)) {
        $usernameError = "Please enter a username.";
        $hasError++;
    }

    // Password validation
    if (empty($Password)) {
        $passwordError = "Please enter a password.";
        $hasError++;
    } elseif (strlen($Password) < 6) {
        $passwordError = "Password must be at least 6 characters long.";
        $hasError++;
    }

    // Confirm Password validation
    if (empty($ConfirmPassword)) {
        $confirmPasswordError = "Please confirm your password.";
        $hasError++;
    } elseif ($Password !== $ConfirmPassword) {
        $confirmPasswordError = "Passwords do not match.";
        $hasError++;
    }

    // Employee Type validation
    if (empty($Emptype)) {
        $emptypeError = "Please select an employee type.";
        $hasError++;
    }

    // Supervisor validation
    if (empty($Supervisor)) {
        $supervisorError = "Please enter a supervisor's name.";
        $hasError++;
    }

    // Terms and conditions validation
    if (!$terms) {
        $termsError = "You must agree to the terms and conditions.";
        $hasError++;
    }

    // If no errors, insert data into the database
    if ($hasError === 0) {
        $tableName = "employee";
        $mydb = new myDB();
        $conobj = $mydb->openCon();

        $result = $mydb->insertData(
            $_REQUEST["FullName"], $_REQUEST["Email"], $_REQUEST["Password"], $_REQUEST["PhoneNo"],
            $_REQUEST["BirthDate"], $_REQUEST["Division"], $_REQUEST["Role"],
            $_REQUEST["Department"], $_REQUEST["UserName"], $_REQUEST["Emptype"], $conobj // Pass connection
        );
    }
} ?>
