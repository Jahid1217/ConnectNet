<?php
include '../control/seller_approveUser_control.php';


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
        <input type="text" id="ID" name="id" value="<?php echo $id;?>"><br><br>
        
        <label for="name">Name:</label><?php echo $Name; ?><br><br>

        <label for="email">Email:</label><?php echo $email; ?><br><br>

        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" value="<?php echo $userName; ?>"><br><br>
        <div class="error" id="error_username"></div>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password; ?>"><br><br>
        <div class="error" id="error_password"></div>

        <input  type="submit" value="Update" name="update">
        <a  class ="editUser_back"href="showuser.php">Back to User List</a>
    </form>
    </div>
    <script src="../js/myScript.js"></script>
</body>
</html>