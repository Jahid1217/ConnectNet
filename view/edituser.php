<?php
include '../control/edituser_control.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="" method="post">
        <label for="ID" >ID:</label>
        <input type="text" id="ID" name="id" value="<?php echo $id;?>" readonly><br><br>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo $Name;?>"><br><br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" value="<?php echo $email;?>"><br><br>
        <label for="username">User Name:</label>
        <input type="text" id="username" name="username" value="<?php echo $userName;?>"><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $password;?>"><br><br>
        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" value="<?php echo $phoneNumber;?>"><br><br>
        <label for="address">Address:</label>
        <textarea id="address" name="address"><?php echo $location;?></textarea><br><br>
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo $dateOfBirth;?>"><br><br>
        <label for="role">Role:</label>
        <select id="role" name="role">
            <option value="<?php echo $role;?>"><?php echo $adminRole;?></option>
            <option value="Network_Admin">Network Admin</option>
            <option value="Billing_Admin">Billing Admin</option>
            <option value="Support_Admin">Support Admin</option>
            <option value="General_Admin">General Admin</option>
        </select><br><br>
        <label for="profile">Profile Picture:</label><br>
        <img src="../uplodefile/<?php echo $profile_Picture;?>" alt="Profile Picture" style="width: 50px; height: 50px;"><br><br>
        <input type="file" id="profile" name="profile" value="<?php echo $profile_Picture;?>"><br><br>
        <label for="ReferenceName">Reference One Name:</label>
        <input type="text" id="ReferenceName" name="reference_name" value="<?php echo $referenceName;?>"><br><br>
        <label for="ReferenceEmail">Reference One Email:</label>
        <input type="text" id="ReferenceEmail" name="reference_email" value="<?php echo $referenceEmail;?>"><br><br>
        <label for="ReferencePhone">Reference One Phone:</label>
        <input type="text" id="ReferencePhone" name="reference_phone" value="<?php echo $referencePhone;?>"><br><br>
        <label for="ReferenceNameTwo">Reference Two Name:</label>
        <input type="text" id="ReferenceNameTwo" name="reference_name_two" value="<?php echo $referenceNameTwo;?>"><br><br>
        <label for="ReferenceEmailTwo">Reference Two Email:</label>
        <input type="text" id="ReferenceEmailTwo" name="reference_email_two" value="<?php echo $referenceEmailTwo;?>"><br><br>
        <label for="ReferencePhoneTwo">Reference Two Phone:</label>
        <input type="text" id="ReferencePhoneTwo" name="reference_phone_two" value="<?php echo $referencePhoneTwo;?>"><br><br>
    
        <input type="submit" value="update" name="update">
    </form>
    <a href="showuser.php">Back to User List</a>
</body>
</html>