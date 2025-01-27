<?php
include '../control/edituser_control.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Edit User</title>
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
    <div id="edit_user_body">
<form  id="edit_user_from"action="" method="post" enctype="multipart/form-data">
        <h1 id="edit_user_h1">Edit User</h1>
        <label for="ID">ID:</label>
        <input type="text" id="ID" name="id" value="<?php echo $id; ?>" readonly><br>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $Name; ?>">
        <div class="error" id="error_name"></div>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email; ?>">
        <div class="error" id="error_email"></div>

        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" value="<?php echo $userName; ?>">
        <div class="error" id="error_username"></div>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>">
        <div class="error" id="error_password"></div>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $phoneNumber; ?>">
        <div class="error" id="error_phone"></div>

        <label for="address">Address:</label>
        <textarea id="address" name="address"><?php echo $location; ?></textarea>
        <div class="error" id="error_address"></div>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $dateOfBirth; ?>">
        <div class="error" id="error_dob"></div>

        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="<?php echo $role; ?>"><?php echo $adminRole; ?></option>
            <option value="Network_Admin">Network Admin</option>
            <option value="Billing_Admin">Billing Admin</option>
            <option value="Support_Admin">Support Admin</option>
            <option value="General_Admin">General Admin</option>
        </select>
        <br>
        <div class="profile-picture">
            <img src="../uplodefile/<?php echo htmlspecialchars($profile_Picture); ?>" alt="Profile Picture" >
            <input type="file" name="profile" id="profileInput"  value="<?php echo htmlspecialchars($profile_Picture); ?>" >
            </div>
        <label for="reference_name">Reference One Name:</label>
        <input type="text" id="reference_name" name="reference_name" value="<?php echo $referenceName; ?>">
        <div class="error" id="error_reference_name"></div>

        <label for="reference_email">Reference One Email:</label>
        <input type="text" id="reference_email" name="reference_email" value="<?php echo $referenceEmail; ?>">
        <div class="error" id="error_reference_email"></div>

        <label for="reference_phone">Reference One Phone:</label>
        <input type="text" id="reference_phone" name="reference_phone" value="<?php echo $referencePhone; ?>">
        <div class="error" id="error_reference_phone"></div>

        <label for="reference_name_two">Reference Two Name:</label>
        <input type="text" id="reference_name_two" name="reference_name_two" value="<?php echo $referenceNameTwo; ?>">
        <div class="error" id="error_reference_name_two"></div>

        <label for="reference_email_two">Reference Two Email:</label>
        <input type="text" id="reference_email_two" name="reference_email_two" value="<?php echo $referenceEmailTwo; ?>">
        <div class="error" id="error_reference_email_two"></div>

        <label for="reference_phone_two">Reference Two Phone:</label>
        <input type="text" id="reference_phone_two" name="reference_phone_two" value="<?php echo $referencePhoneTwo; ?>">
        <input  type="submit" value="Update" name="update">
        <a  class ="editUser_back"href="showuser.php">Back to User List</a>
    </form>
    </div>
    <script src="../js/myScript.js"></script>
</body>
</html>