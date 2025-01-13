<?php
include '../control/deleteuser_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Delete User</h1>
    <form action="" method="post">
        <label for="ID">ID:</label> <?php echo $id;?><br><br>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <label for="name">Name:</label> <?php echo $Name;?><br><br>
        <label for="email">Email:</label> <?php echo $email;?><br><br>
        <label for="username">User Name:</label> <?php echo $userName;?><br><br>
        <label for="password">Password:</label> <?php echo $password;?><br><br>
        <label for="phone">Phone:</label> <?php echo $phoneNumber;?><br><br>
        <label for="address">Address:</label> <?php echo $location;?><br><br>
        <label for="dob">Date of Birth:</label> <?php echo $dateOfBirth;?><br><br>
        <label for="role">Role:</label> <?php echo $adminRole;?><br><br>
        <label for="profile">Profile Picture:</label> <?php echo $profile_Picture;?><br><br>
        <label for="reference_name">Reference Name:</label> <?php echo $referenceName;?><br><br>
        <label for="reference_email">Reference Email:</label> <?php echo $referenceEmail;?><br><br>
        <label for="reference_phone">Reference Phone:</label> <?php echo $referencePhone;?><br><br>
        <label for="reference_name_two">Reference Name Two:</label> <?php echo $referenceNameTwo;?><br><br>
        <label for="reference_email_two">Reference Email Two:</label> <?php echo $referenceEmailTwo;?><br><br>
        <label for="reference_phone_two">Reference Phone Two:</label> <?php echo $referencePhoneTwo;?><br><br>
        
    <input type="submit" value="Delete" name = "delete">
    </form>
</body>
</html>