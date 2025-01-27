<?php
session_start();
include '../control/admin_profile_setting.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Profile Settings</title>
</head>
<body>
<div class="navbar">
    <div class="logo">
        <a href="home.php">Home</a>
    </div>
    <div class="nav-links">
        <a href="admin_profile.php?username=<?php echo htmlspecialchars($_SESSION['user_name']); ?>">Profile</a>
        <a href="admin_profile.php?username=<?php echo htmlspecialchars($_SESSION['user_name']); ?>">Settings</a>
    </div>
</div>
<div class="containerSetting">
    <div class="profile-setting">
        <h1>Profile Settings</h1>
        <form action="" method="post" enctype="multipart/form-data">
            
            <div class="profile-picture">
            <img src="../uplodefile/<?php echo htmlspecialchars($profile_Picture); ?>" alt="Profile Picture" >
            <input type="file" name="profile" id="profileInput"  value="<?php echo htmlspecialchars($profile_Picture); ?>" >
            </div>

            <label for="username">User Name:</label>
            <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($userName); ?>" >

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($Name); ?>" >

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" >

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob" value="<?php echo htmlspecialchars($dateOfBirth); ?>" >

            <label for="phone">Phone:</label>
            <input type="text" name="phone" id="phone" value="<?php echo htmlspecialchars($phoneNumber); ?>" >

            <label for="address">Address:</label>
            <input type="text" name="address" id="address" value="<?php echo htmlspecialchars($location); ?>" >

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" value="<?php echo htmlspecialchars($password); ?>" >

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" id="confirm_password" value="<?php echo htmlspecialchars($password); ?>" >

            <input type="submit" value="Update" name="update">
        </form>
    </div>
</div>
 <script src="../js/myScript.js"></script>
</body>
</html>
