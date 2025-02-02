<?php
    require '../control/login_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Login</title>
</head>
<body class="bodyLoginRegistration">
    <div class="login">
    <form action="" method="POST" onsubmit="return validateFormLogin()" enctype="multipart/form-data">
    <fieldset>
        <legend><h1>Login</h1></legend>
        <table class="loginTable">
            <tr>
                <td><label for="username" class="label">Username:</label></td>
                <td>
                    <input type="text" name="user_name" id="username" class="input" placeholder="Username">
                    <p id="error_username" class="error"></p>
                </td>
            </tr>
            <tr>
                <td><label for="password" class="label">Password:</label></td>
                <td>
                    <input type="password" id="password" class="input" name="Password" placeholder="Password">
                    <p id="error_password" class="error"></p>
                </td>
            </tr>
            <tr class= "error"> <?php echo $failedLogin ?></tr>
            <tr>
                <td><input type="reset" value="Clear" class="logBtn"></td>  
                <td><input type="submit" name="login" value="Login" class="logBtn"></td> 
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;"><a href="admin.php">Register</a></td>
            </tr>
        </table>
    </fieldset>
</form>
    </div>
    <script src="../js/myScript.js"></script> 
</body>
</html>
