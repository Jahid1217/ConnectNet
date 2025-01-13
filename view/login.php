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
        <form action="" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend><h1>Login</h1></legend>
                <table class="loginTable">
                    <tr>
                        <td><label for="Role" class="label">Role:</label></td>
                        <td>
                            <select name="role" id="Role" class="input" required>
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
                        <td><input type="text" name="user_name" id="username" class="input" placeholder="Username" required></td>
                    </tr>
                    <tr>
                        <td><label for="password" class="label">Password:</label></td>
                        <td><input type="password" id="password" class="input" name="Password" placeholder="Password" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="checkbox" id="terms" name="terms" required> 
                            <label for="terms">I agree to the <a href="#">Terms and Conditions</a></label>
                        </td>
                    </tr>
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
</body>
</html>
