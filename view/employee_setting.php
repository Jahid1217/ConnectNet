<?php
session_start();
include '../control/update_control.php';

if (!isset($_SESSION["user_name"])) {
    header("location:../view/login.php");
    exit;
}
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
        <a href="employeeDashboard.php">Home</a>
    </div>
    <div class="nav-links">
        <a href="employee_profile.php?username=<?php echo htmlspecialchars($_SESSION['user_name']); ?>">Profile</a>
        <a href="employee_setting.php?username=<?php echo htmlspecialchars($_SESSION['user_name']); ?>">Settings</a>
    </div>
</div>
<div class="settings_container">
        <h1>Settings</h1>

        <form action="" method="POST" enctype="multipart/form-data">
    <table class="settings-table">
        <tr><th colspan="2"><h2>Profile Information</h2></th></tr>
        
        <tr>
            <td><label for="profile_picture">Profile Picture:</label></td>
            <td>
            <?php if (!empty($userDetails['picture'])): ?>
                  <img src="../uploads/<?php echo htmlspecialchars($userDetails['picture']); ?>" alt="Profile Picture" >
            <?php else: ?>
            <p>No profile picture uploaded.</p>
             <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td> </td>
            <td><input type="file" name="profile_picture" id="profile_picture"></td>
        </tr>

        <tr>
            <td><label for="name">Name:</label></td>
            <td><input type="text" name="name" value="<?php echo htmlspecialchars($userDetails['name']); ?>"></td>
        </tr>
        <tr>
            <td><label for="email">Email:</label></td>
            <td><input type="email" name="email" value="<?php echo htmlspecialchars($userDetails['email']); ?>"></td>
        </tr>
        <tr>
            <td><label for="phone">Phone Number:</label></td>
            <td><input type="text" name="phone" value="<?php echo htmlspecialchars($userDetails['phoneNumber']); ?>"></td>
        </tr>
        <tr>
            <td><label for="dob">Date of Birth:</label></td>
            <td><input type="date" name="dob" value="<?php echo htmlspecialchars($userDetails['DOB']); ?>"></td>
        </tr>
        <tr>
            <td><label for="address">Address:</label></td>
            <td><input type="text" name="address" id="address" value="<?php echo htmlspecialchars($userDetails['location']); ?>"></td>
        </tr>
        

        <tr>
            <td>
            <a href="pass_change.php?username=<?php echo($_SESSION['user_name']); ?>">Change Password</a>
            </td>
        </tr>
        

        <tr><th colspan="2"><h2>Notifications</h2></th></tr>
        <tr>
            <td><label>Email Notifications:</label>
            <input type="checkbox" name="email_notifications" id="email_notifications"></td>
        </tr>
        <tr>
            <td><label>SMS Notifications:</label><input type="checkbox" name="sms_notifications"></td>
        </tr>
       

        <tr>
            <td colspan="2" style="text-align:center;">
                <button class="button" type="submit" name="update" value="update">Save Changes</button>
            </td>
        </tr>
    </table>
    <script src="../js/myScript.js"></script>
</form>

    </div>

</body>
</html>
