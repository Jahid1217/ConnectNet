 <?php
   require '../control/reg_control.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Employee Sign Up</title>
    <link rel="stylesheet" href="../styles/styles.css">
    </head>
<body>

<h1 id="title">Employee Sign Up</h1>
        <form action="" method="POST" onsubmit="return validateForm()" enctype="multipart/form-data" >
        <fieldset>
            <legend>Employee Information & Details</legend>
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" id="name" name="FullName" placeholder="Full Name" ></td>
                    <td><p id="error_Name" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $FullNameError; ?></p></td>
                </tr>
                
                <tr>
                    <td>Email:</td>
                    <td><input type="text" id="email" name="Email" placeholder="Email" ></td>
                    <td><p id="error_email" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $emailError; ?></p></td>
                </tr>
                <tr>
                    <td>Phone No:</td>
                    <td><input type="text" id="phone_number" name="PhoneNo" placeholder="Phone No"></td>
                    <td><p id="error_phone" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $phoneNoError; ?></p></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" id="dob" name="BirthDate" ></td>
                    <td><p id="error_dob" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $BirthDateError; ?></p></td>
                </tr>
                <tr>
                    <td>Address: </td>
                    <td>
                        <select name="Division" id="division" onchange="updateDistricts()">
                        <option value="" disabled selected>Select your division</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Barisal">Barisal</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Mymensingh">Mymensingh</option>
                        </select>
                    </td>
                    <td>
                        <p id="error_division" class="error"></p>
                    </td>
                </tr>
                <tr>
                    <td>  </td>
                    <td>
                        <select name="District" id="district"  disabled>
                        <option value="" disabled selected>Select your district</option>
                        </select>
                    </td>
                    <td>
                        <p id="error_district" class="error"></p>
                     </td>
                 </tr>
                 <tr>
                    <td>Department:</td>
                    <td>
                        <select id="Department" name="Department" onchange="updateRoles()">
                            <option value="" disabled selected>Select Department</option>
                            <option value="Technical Support">Technical Support</option>
                            <option value="Sales">Sales</option>
                            <option value="Billing">Billing</option>
                        </select>
                    </td>
                    <td><p id="error_Department" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $departmentError; ?></p></td>
                </tr>

                <tr>
                    <td>Role:</td>
                    <td>
                        <select id="role" name="Role">
                            <option value="" disabled selected>Select Role</option>
                        </select>
                    </td>
                    <td><p id="error_Role" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $roleError; ?></p></td>
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td><input type="text" id="username" name="UserName" placeholder="User Name" ></td>
                    <td><p id="error_Username" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $usernameError; ?></p></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" id="password" name="Password" placeholder="Password" ></td>
                    <td><p id="error_Password" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $passwordError; ?></p></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" id="confirm_password" name="Confirm_Password" placeholder="Confirm_Password" ></td>
                    <td><p id="error_Confirm_Password" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $passwordError; ?></p></td>
                </tr>
                <tr>
                    <td>Employee Type:</td>
                    <td>
                        <input type="radio" name="Emptype" value="Full-Time">Full-Time
                        <input type="radio" name="Emptype" value="Part-Time">Part-Time
                        <input type="radio" name="Emptype" value="Contract">Contract
                    </td>
                    <td><p id="error_Emptype" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $emptypeError; ?></p></td>
                </tr>
                <tr>
                    <td>Supervisor:</td>
                    <td><input type="text" id="supervisor" name="Supervisor" placeholder="Supervisor" ></td>
                    <td><p id="error_Supervisor" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $supervisorError; ?></p></td>
                </tr>
                <tr>
                    <td>CV:</td>
                    <td><label for="file"></label>
                    <input type="file" id="file" name="file"></td>
                    <td><p id="error_CV" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $fileError; ?></p></td>
                </tr>
                <tr>
                    <td colspan="2"><label>
                    <input type="checkbox" name="terms" id="terms" > I agree to the <a href="#" onclick="openTermsPopup()">Terms and Conditions</a>.
                    </label>
                    </td>
                    <td><p id="error_terms" class="error"><i class='fas fa-exclamation-circle'></i><?php echo $termsError; ?></p></td>
                </tr>
            </table>
            
        </fieldset>
        <div class="button-container">
    <input class="button" type="submit" value=" Sign Up ">
    <input class="button" type="reset" value="Clear Form">
</div>
<div id="termsModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeTermsPopup()">&times;</span>
            <h2>Terms and Conditions</h2>
            <p>
                1. You must provide accurate and truthful information.<br>
                2. Your account may be suspended if fraudulent activities are detected.<br>
                3. The company reserves the right to update terms at any time.<br>
                4. Employees must adhere to company policies at all times.<br>
                5. Violation of any policy may result in termination.<br>
            </p>
        </div>
    </div>
             <table>
                <tr>
                    <td>
                        <p>Already have an account? <a href="../view/login.php">Login</a></p>
                    </td>
                </tr>
             </table>
              <script src= "../js/myScript.js"></script>
    </form>
</body>
</html>


