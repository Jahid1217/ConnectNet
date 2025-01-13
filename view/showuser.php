<?php
session_start();
include '../control/showuser_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>data show</title>
</head>
<body>
    <br>
    <a  class="butt1" href="../control/session_Logout.php">Logout</a>
    <a class="butt2" href="../view/home.php">Back</a>
</body>
</html>
<?php
if(!isset($_SESSION["user_name"])){
    header("location:../view/login.php");
    exit;
}
?>