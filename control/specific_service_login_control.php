<?php
include "../model/db.php";

session_start();

if (!isset($_SESSION["seller_Id"])) {
    header("Location: login.php");
    exit();
}

$myDB = new MyDB();
$sellerId = $_SESSION["seller_Id"];
$services = $myDB->getSellerServicesById($sellerId);
?>
