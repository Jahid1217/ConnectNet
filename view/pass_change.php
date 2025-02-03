<?php
session_start();
   require '../control/pass_change_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/styles.css">
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
    <th ><h2>Change Password</h2></th>

    <?php echo "User Name: ".($_SESSION['user_name']); ?>
   
    <table>
        <tr>
            <td><label for="current_password">Current Password:</label></td>
            <td><input type="password" name="current_password" id="current_password"></td>
        </tr>
        <tr>
            <td><label for="new_password">New Password:</label></td>
            <td><input type="password" name="new_password"></td>
        </tr>
        <tr>
            <td><label for="confirm_password">Confirm New Password:</label></td>
            <td><input type="password" name="confirm_password"></td>
        </tr>
        <tr>
            <td><input class="button" type="submit" name="update" value="Update"></td>
        </tr>
    </table>
    <table>
                <tr>
                    <td>
                        <a href="employee_setting.php?username=<?php echo htmlspecialchars($_SESSION['user_name']); ?>">Back</a>
                    </td>
                </tr>
             </table>
    </form>
   
</body>
</html>

