<?php
    include '../control/reg_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Admin Signup</title>
</head>
<body class="bodyLoginRegistration">
    <h1>Admin Signup</h1>
    <div class="reg1">
    <form action="" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data">
            <fieldset>
                <legend>Admin Information</legend>
                <table>
                    <tr>
                        <td><label for="name" class="label">Name:</label></td>
                        <td><input type="text" name="Name" id="name" class="input" placeholder="Name">
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $NameError; ?></p>
                        <p id="error_Name" class="error"></p>
                    </td>
                    
                    </tr>
                    <tr>
                        <td><label for="username" class="label">Username:</label></td>
                        <td><input type="text" name="user_name" id="username" class="input" placeholder="Username">
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $userNameError; ?></p>
                        <p id="error_Username" class="error"></p>
                    </td>
                    
                    </tr>
                    <tr>
                        <td><label for="email" class="label">Email Address:</label></td>
                        <td><input type="text" id="email" name="email" class="input" placeholder="@gmail.com">
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $emailError; ?></p>
                        <p id="error_email" class="error"></p>
                    </td>
                    
                    </tr>
                    <tr>
                        <td><label for="dob" class="label">Date of Birth:</label></td>
                        <td><input type="date" id="dob" name="date_of_birth" class="input">
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $dateOfBirthError; ?></p>
                        <p id="error_dob" class="error"></p>
                    </td>
                    
                    </tr>
                    <tr>
                        <td><label for="phone" class="label">Phone Number:</label></td>
                        <td><input type="text" id="phone" name="phone_number" class="input">
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $phoneNumberError; ?></p>
                        <p id="error_phone" class="error"></p>
                    </td>

                    </tr>
                    <tr>
                        <td><label for="password" class="label">Password:</label></td>
                        <td><input type="password" id="password" name="Password" class="input" placeholder="Password">
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $passwordError; ?></p>
                        <p id="error_password" class="error"></p>
                    </td>
                    
                    </tr>
                    <tr>
                        <td><label for="confirm_password" class="label">Confirm Password:</label></td>
                        <td><input type="password" id="confirm_password" name="confirm_password" class="input" placeholder="Confirm Password">
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $confirmPasswordError; ?></p>
                        <p id="error_conPass" class="error"></p>
                    </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="admin_Role">Admin Role:</label></td>
                        <td>
                            <select name="admin_role" id="admin_Role" class="input">
                                <option value="">Choose a Role</option>
                                <option value="Network_Admin">Network Admin</option>
                                <option value="Billing_Admin">Billing Admin</option>
                                <option value="Support_Admin">Support Admin</option>
                                <option value="General_Admin">General Admin</option>
                            </select>
                            <p id="error_admin" class="error"></p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="address" class="label">Location:</label></td>
                        <td><textarea id="address" name="location" rows="4" cols="30" class="input" placeholder="Address"></textarea>
                        <p id="error_address" class="error"></p>
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $locationError; ?></p>
                    </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="file">Profile Picture:</label></td>
                        <td><input type="file" id="file" name="profile_picture" >
                        <p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $profilePictureError; ?></p>
                        <p id="error_file" class="error"></p>
                    </td>
                    
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend>References</legend>
                <table>
                    <tr>
                        <td><label for="reference_name" class="label">Reference Name 1:</label></td>
                        <td><input type="text" id="reference_name" name="reference_name" class="input" placeholder="Reference Name">

                        <p id="error_refName_One" class="error"></p>
                    </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="reference_email" class="label">Reference Email 1:</label></td>
                        <td><input type="text" id="reference_email" name="reference_email" class="input" placeholder="@gmail.com">
                        <p id="error_refEmail" class="error"></p>
                    </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="reference_phone" class="label">Reference Phone 1:</label></td>
                        <td><input type="text" id="reference_phone" name="reference_phone" class="input" placeholder="Phone Number">
                        <p id="error_refPhone" class="error"></p>
                    </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="reference_name_two" class="label">Reference Name 2:</label></td>
                        <td><input type="text" id="reference_name_two" name="reference_name_two" class="input" placeholder="Reference Name">
                        <p id="error_refName_two" class="error"></p>
                    </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><label for="reference_email_two" class="label">Reference Email 2:</label></td>
                        <td><input type="text" id="reference_email_two" name="reference_email_two" class="input" placeholder="@gmail.com">
                        <p id="error_refEmail_two" class="error"></p>
                    </td>
                        <td></td>
                    </tr>
                    <tr>
                    <td><label for="reference_phone_two" class="label">Reference Phone 2:</label></td>
                     <td><input type="text" id="reference_phone_two" name="reference_phone_two" class="input" placeholder="Phone Number">
                     <p id="error_refPhone_two" class="error"></p>
                    </td>
                    <td></td>
                    </tr>
                </table>
            </fieldset>
            <div>
                <input type="checkbox" id="terms" name="terms"> I agree to the <a href="#">Terms and Conditions</a>
                <p id="error_terms" class="error"></p>
            </div>
            <div>
            <input type="submit" name="submit" value="Submit Form" class="logBtn">
                <button type="button" class="logBtn">
                    <a href="login.php">login Page</a>
                </button>
            </div>
        </form>
    </div> 
    <script src="../js/myScript.js"></script>
</body>
</html>
