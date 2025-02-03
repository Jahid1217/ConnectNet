
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
            <a href="employeeDashboard.php">Home</a>
        </div>
        <div class="nav-links">
            <a href=""></a>
            <a href="employee_profile.php?username=<?php echo($_SESSION['user_name']); ?>">Profile</a>
            <a href="employee_setting.php?username=<?php echo($_SESSION['user_name']); ?>">Settings</a>
        </div>
    </div>
    <?php
        session_start();
        include '../control/feedbackView_control.php';
    ?>
   
</body>
<script src="../js/myScript.js"></script>
</html>
<?php
if(!isset($_SESSION["user_name"])){
    header("location:../view/login.php");
    exit;
}
?>