<?php
include '../control/home_control.php';
session_start();
if (!isset($_SESSION["user_name"])) {
    header("location:../view/admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Document</title>
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

    <div class="container">
        <div class="header">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h1>
            <p>Here is your dashboard:</p>
        </div>

        <img src="../uplodefile/logo.png" alt="Logo">
        
        <div class="links">
            <label for="">Number of Admin: 
            <span id="adminCount"><?php  echo $numAdmin?> </span></label>

            <label for="">Number of Employee: 
            <span id="employeeCount"><?php  echo $numemp ?></span></label>
            
            <label for="">Number of Seller: 
            <span id="sellerCount"><?php  echo $numSeller?></span></label>
            
            <label for="">Number of Customer: 
            <span id="customerCount"><?php  echo $numCustomer?></span></label>
        </div>
        <div class="links">
            <a href="showuser.php">Admin Database List</a>
            <a href="employee_info.php">Employee Database List</a>
            <a href="seller_info.php">Seller Database List</a>
            <a href="customer_info.php">Customer Database List</a>
        </div>

        <div class="logout">
            <a href="../control/session_Logout.php">Logout</a>
        </div>
    </div>
</body>
</html>