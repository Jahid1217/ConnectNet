<?php
session_start();
require "../database/db.php";

if (isset($_GET["username"])){
    $username = $_GET["username"];
    $mydb = new myDB();
    $conobj = $mydb->openCon();
   
    $employeeDetails = $mydb->getEmployeeDetails( $conobj, $username);
    $profile_Picture = "<img src='../uploads/" . htmlspecialchars($employeeDetails['picture']) . "' alt='Profile Picture' id='User_Show_Pic'>";
    if (!$employeeDetails) {
        die("Employee not found.");
    }
    $conobj->close();
}
else {
    die("Username not found.");
}

?>
