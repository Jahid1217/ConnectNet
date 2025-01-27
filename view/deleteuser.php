<?php
include '../control/deleteuser_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Document</title>
</head>
<body >
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
    
    <div id="delete_user_body">
    <h1 id="delete_user_h1">Delete User</h1>
    <form id="delete_from"action="" method="post">
    <div class="form-row">
            <label for="ID">ID:</label> <span class="value"><?php echo $id;?></span>
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div class="form-row">
            <label for="name">Name:</label> <span class="value"><?php echo $Name; ?></span>
        </div>
        <div class="form-row">
            <label for="email">Email:</label> <span class="value"><?php echo $email; ?></span>
        </div>
        <div class="form-row">
            <label for="username">User Name:</label> <span class="value"><?php echo $userName; ?></span>
        </div>
        <div class="form-row">
            <label for="password">Password:</label> <span class="value"><?php echo $password; ?></span>
        </div>
        <div class="form-row">
            <label for="phone">Phone:</label> <span class="value"><?php echo $phoneNumber; ?></span>
        </div>
        <div class="form-row">
            <label for="address">Address:</label> <span class="value"><?php echo $location; ?></span>
        </div>
        <div class="form-row">
            <label for="dob">Date of Birth:</label> <span class="value"><?php echo $dateOfBirth; ?></span>
        </div>
        <div class="form-row">
            <label for="role">Role:</label> <span class="value"><?php echo $adminRole; ?></span>
        </div>
        <div class="form-row">
            <label for="profile">Profile Picture:</label> <span class="value"><?php echo $profile_Picture; ?></span>
        </div>
        <div class="form-row">
            <label for="reference_name">Reference Name:</label> <span class="value"><?php echo $referenceName; ?></span>
        </div>
        <div class="form-row">
            <label for="reference_email">Reference Email:</label> <span class="value"><?php echo $referenceEmail; ?></span>
        </div>
        <div class="form-row">
            <label for="reference_phone">Reference Phone:</label> <span class="value"><?php echo $referencePhone; ?></span>
        </div>
        <div class="form-row">
            <label for="reference_name_two">Reference Name Two:</label> <span class="value"><?php echo $referenceNameTwo; ?></span>
        </div>
        <div class="form-row">
            <label for="reference_email_two">Reference Email Two:</label> <span class="value"><?php echo $referenceEmailTwo; ?></span>
        </div>
        <div class="form-row">
            <label for="reference_phone_two">Reference Phone Two:</label> <span class="value"><?php echo $referencePhoneTwo; ?></span>
        </div>
    <input id="delete_user" type="submit" value="Delete" name = "delete">
    <a href="../view/showuser.php" id="delete_user_back">Back</a>
    </form>
    </div>
</body>
</html>