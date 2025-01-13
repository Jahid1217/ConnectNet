<?php
    require '../control/reg_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="../styles/styles.css">
    <title>Document</title>
</head>
<body class="bodyLoginRegistration">
    <h1>Admin Signup</h1>
    <div class="reg1">
<form action="" method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Admin Information</legend>
            <table>
                
                <tr>
                    <td><label for="" class="label">Name:</label></td>
                    <td><input type="text" name="Name" class="input" placeholder="Name" ></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $NameError; ?></p></td>

                </tr>
                <tr>
                    <td><label for="" class="label">Username:</label></td>
                    <td><input type="text" name="user_name" class="input" placeholder="Username" ></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $userNameError; ?></p></td>
                </tr>
                <tr>
                    <td><label for="" class="label">Email Address:</label></td>
                    <td><input type="text" name="email" class="input" placeholder="@gmail.com" ></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $emailError; ?></p></td>
                </tr>
                <tr>
                    <td><label for="" class="label">Date of Birth:</label></td>
                    <td><input type="date" name="dath_of_birth" class="input" ></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $dateOfBirthError; ?></p></td>
                </tr>
                <tr>
                    <td><label for="" class="label">Phone Number:</label></td>
                    <td><input type="text" name="phone_number" class="input" ></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $phoneNumberError; ?></p></td>
                </tr>
                <tr>
                    <td><label for="" class="label">Password:</label></td>
                    <td><input type="password" id="myFile" name="Password" class="input" placeholder="Password" ></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $passwordError; ?></p></td>
                </tr>
                <tr>
                    <td><label for="" class="label">Confirm Password:</label></td>
                    <td><input type="password" id="myFile" name="confirm_password" class="input" placeholder="Confirm_Password" ></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $confirmPasswordError; ?></p></td>
                </tr>
                <tr>
                    <td><label for="Admin_Role">Admin Role:</label></td>
                    <td><select name="admin_role" id="admin_Role" class="input" required>
                <option value="">Choose a Role</option>
                <option value="Network_Admin">Network Admin</option>
                <option value="Billing_Admin">Billing Admin</option>
                <option value="Support_Admin">Support Admin</option>
                <option value="General_Admin">General Admin</option>
                    </td>
                </tr>
                <tr>
                    <td><label for="" class="label">Location:</label></td>
                    <td><textarea name="location"rows="4" cols="30" class="input" placeholder="Address"></textarea></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $locationError; ?></p></td>
                </tr>
                </tr>
                <tr>
                <tr>
                    <td><label for="profile_Pic">Profile Picture:</label></td>
                    <td><input type="file" name="profile_picture" id="profile_picture" class="input"></td>
                    <td><p class="error"><i class='fas fa-exclamation-circle'></i><?php echo $profilePictureError; ?></p></td>
                </tr>
            </table>
        </fieldset>
        <table>
            <tr>
                <td>
                    <fieldset>
                        <legend>Reference One</legend>
                        <table>
                            <tr>
                                <td><label for="" class="label">Name:</label></td>
                                <td><input type="text" name="reference_name" class="input" placeholder="Reference Name" ></td>
                                <td><p class="error"><i class='fas fa-exclamation-circle'></i></p></td>
                </tr>
                            </tr>
                            <tr>
                                <td><label for="" class="label">Email Address:</label></td>
                                <td><input type="text" name="reference_email" class="input" placeholder="@gmail.com" ></td>
                                <td><p class="error"><i class='fas fa-exclamation-circle'></i></p></td>
                </tr>
                            </tr>
                            <tr>
                                <td><label for="" class="label">Phone Number:</label></td>
                                <td><input type="text" name="reference_phone" class="input" placeholder="Phone Number" ></td>
                                <td><p class="error"><i class='fas fa-exclamation-circle'></i></p></td>
                </tr>
                            </tr>
                        </table>
                    </fieldset>
                </td>
                <td>
                <fieldset>
                        <legend>Reference Two</legend>
                        <table>
                            <tr>
                                <td><label for="" class="label">Name:</label></td>
                                <td><input type="text" name="reference_name_two" class="input" placeholder="Reference Name" ></td>
                                <td><p class="error"><i class='fas fa-exclamation-circle'></i></p></td>
                </tr>
                            </tr>
                            <tr>
                                <td><label for="" class="label">Email Address:</label></td>
                                <td><input type="text" name="reference_email_two" class="input" placeholder="@gmail.com" ></td>
                                <td><p class="error"><i class='fas fa-exclamation-circle'></i></p></td>
                </tr>
                            </tr>
                            <tr>
                                <td><label for="" class="label">Phone Number:</label></td>
                                <td><input type="text" name="reference_phone_two" class="input"placeholder="Phone Number" ></td>
                                <td><p class="error"><i class='fas fa-exclamation-circle'></i></p></td>
                </tr>
                            </tr>
                            
                        </table>
                    </fieldset>
                </td>
            </tr>
            <tr>
                <td><input type="checkbox" id="terms" name="terms" required> I agree to the <a href="#">Terms and Conditions</a></td>
            </tr>
        </table>
             <input type="submit"value="Submit Form" class="logBtn">
             <input type="reset"value="Clear Form" class="logBtn">
    </form>
    </div>

</body>
</html>