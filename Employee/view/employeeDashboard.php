<?php
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
    <title>Employee Dashboard</title>
   
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <a href="home.php">Home</a>
        </div>
        <div class="nav-links">
            <a href="admin_profile.php?username=<?php echo($_SESSION['user_name']); ?>">Profile</a>
            <a href="profileSetting.php?username=<?php echo($_SESSION['user_name']); ?>">Settings</a>
        </div>
    </div>

    <div class="container">
        <div class="header">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION["user_name"]); ?>!</h1>
            <p>Here is your dashboard:</p>
        </div>

        <div class="content">
            <div class="card">
                <h2>Feedback</h2>
                <a href="feedback_view.php">Go to Feedback</a>
            </div>
            <div class="card">
                <h2>Tasks</h2>
                <a href="tasks.php">Go to Tasks</a>
            </div>
            <div class="card">
                <h2>Performance</h2>
                <a href="performance.php">Go to Performance</a>
            </div>
            <div class="card">
                <h2>Leave Requests</h2>
                <a href="leave_requests.php">Go to Leave Requests</a>
            </div>
        </div>

        
    </div>
    <div class="logout">
            <a href="../../view/login.php">Logout</a>
        </div>
</body>
</html>
