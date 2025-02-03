<?php
include_once '../control/update_control.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body class="edit-user-page">
    <h1>Edit User</h1>
    <form action="" method="post">
        <label for="ID" >ID:</label>
        <input type="text" id="ID" name="employee_Id" value="<?php echo $id;?>" readonly><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $Name;?>"><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email;?>"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password;?>"><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $phoneNumber;?>"><br><br>
        <label for="address">Address:</label>
        <textarea id="address" name="address"><?php echo $location;?></textarea><br><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $dateOfBirth;?>"><br><br>
        
        <input type="submit" value="update" name="update">
    </form>
    <a href="show_user.php">Back to User List</a>
</body>
</html>