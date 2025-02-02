<?php
    require '../control/login_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/newcss.css">
    <title>Login</title>
    <style>
        .terms-container {
            display: flex;
            align-items: center;
        }
        .terms-container input {
            margin-right: 5px; /* Add some spacing between the checkbox and the label */
        }
        .terms-container input {
    width: 16px;
    height: 16px;
}
    </style>
</head>
<body class="bodyLoginRegistration">
    <div class="login">
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><h1>Login</h1></legend>
                <table class="loginTable">
                    <!-- Role Selection Row -->
                    <tr>
                        <td><label for="Role" class="label">Role:</label></td>
                        <td>
                            <select name="role" id="Role" class="input">
                                <option value="">Choose a Role</option>
                                <option value="customer">Customer</option>
                                <option value="seller">Seller</option>
                                <option value="admin">Admin</option>
                                <option value="employee">Employee</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="username" class="label">Username:</label></td>
                        <td><input type="text" name="username" id="username" class="input" placeholder="Username"></td>
                    </tr>
                    <tr>
                        <td><label for="password" class="label">Password:</label></td>
                        <td><input type="password" id="password" class="input" name="password" placeholder="Password"></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <label for="terms" class="terms-container">
    <input type="checkbox" id="terms" name="terms">
    I agree to the  <a href="#">Terms and Conditions</a>
</label>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="reset" value="Clear" class="logBtn"></td>  
                        <td><input type="submit" name="login" value="Login" class="logBtn"></td> 
                    </tr>
                    <tr>
    <td colspan="2" style="text-align:center;">
        <span>Don't Have an Account? </span>
        <a href="seller.php" class="registerLink">Register</a>
    </td>
</tr>
                </table>
            </fieldset>
        </form>
    </div>
    <script src="../js/login.js"></script> 
</body>
</html>
