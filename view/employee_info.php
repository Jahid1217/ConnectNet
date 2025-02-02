<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>data show</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="home.php">Home</a>
        </div>
        <div class="nav-links">
            <a href=""></a>
            <a href="admin_profile.php?username=<?php echo($_SESSION['user_name']); ?>">Profile</a>
            <a href="profileSetting.php?username=<?php echo($_SESSION['user_name']); ?>">Settings</a>
        </div>
    </div>
    <?php
        session_start();
        include '../control/employee_searchUser_control.php';
        include '../control/employee_showUser_control.php';
    ?>
    <br>
    <h2>Employee Data</h2>
    <label for="name">Search by Email:</label>
    <input type="text" name="name" value="" id="employeeUser" onkeyup="searchUserEmployee()"  >
    <p id="employeePrint"></p>
    <br>
    <a  class="butt1" href="../control/session_Logout.php">Logout</a>
    <a class="butt2" href="../view/home.php">Back</a>
</body>
<script src="../js/myScript.js"></script>
</html>
<?php
if(!isset($_SESSION["user_name"])){
    header("location:../view/login.php");
    exit;
}
?>