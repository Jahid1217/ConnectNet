<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration</title>
    <link rel="stylesheet" href="../css/newcss.css">
</head>
<body>
    <img src="../images/seller.jpg" alt="Seller Registration" width="200" height="130">
    <h1>Seller Registration Form</h1>

    <table>
        <form method="POST" action="../control/reg_control.php">
            <!-- Seller Name -->
            <tr>
                <td>Full Name:</td>
                <td>
                    <input type="text" id="name" name="name">
                </td>
            </tr>

            <!-- Email -->
            <tr>
                <td>Email Address:</td>
                <td>
                    <input type="email" id="email" name="email">
                </td>
            </tr>

            <!-- Username -->
            <tr>
                <td>Username:</td>
                <td>
                    <input type="text" id="username" name="username">
                </td>
            </tr>

            <!-- Password -->
            <tr>
                <td>Password:</td>
                <td>
                    <input type="password" id="password" name="password" placeholder="Must be 8 characters">
                </td>
            </tr>

            <!-- Confirm Password -->
            <tr>
                <td>Confirm Password:</td>
                <td>
                    <input type="password" id="confirm_password" name="confirm_password">
                </td>
            </tr>

            <!-- Gender Selection -->
            <tr>
                <td>Gender:</td>
                <td>
                    <input type="radio" id="male" name="gender" value="Male"> Male
                    <input type="radio" id="female" name="gender" value="Female"> Female
                    <input type="radio" id="other" name="gender" value="Other"> Other
                </td>
            </tr>

            <!-- Phone Number -->
            <tr>
                <td>Phone Number:</td>
                <td>
                    <input type="tel" id="phoneNumber" name="phoneNumber" placeholder="11-digit phone number">
                </td>
            </tr>

            <!-- Business Name -->
            <tr>
                <td>Business Name:</td>
                <td>
                    <input type="text" id="businessName" name="businessName">
                </td>
            </tr>

            <!-- Business Type -->
            <tr>
                <td>Business Type:</td>
                <td>
                    <select id="businessType" name="businessType">
                        <option value="">Select a Business Type</option>
                        <option value="BroadBand">Broad Band</option>
                        <option value="Optical">Optical</option>
                        <option value="dsl">DSL</option>
                    </select>
                </td>
            </tr>

            <!-- Location -->
            <tr>
                <td>Location:</td>
                <td>
                    <textarea id="location" name="location" rows="4" cols="50"></textarea>
                </td>
            </tr>

            <!-- Role (Hidden Field) -->
            <input type="hidden" name="role" value="seller">

            <!-- Terms and Conditions -->
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox" id="terms" name="terms"> I agree to the terms and conditions
                    </label>
                </td>
            </tr>

            <!-- Submit and Reset Buttons -->
            <tr>
                <td colspan="2">
                    <button type="submit">Submit</button>
                    <input type="reset" value="Clear">
                </td>
            </tr>
        </form>
    </table>
    <script src="../js/validation_js.js"></script>
</body>
</html>
