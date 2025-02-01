<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="stylesheet" href="../css/mystyle.css">
</head>
<body>
    <h1>Customer Registration Form</h1>
    
    <table>
        <form action="../control/reg_control.php" method="POST" enctype="multipart/form-data">
            <!-- Full Name -->
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="name" ></td>
            </tr>

            <!-- Email -->
            <tr>
                <td>Email Address:</td>
                <td><input type="email" name="email" ></td>
            </tr>

            <!-- Phone Number -->
            <tr>
                <td>Phone Number:</td>
                <td><input type="tel" name="phone" ></td>
            </tr>

            <!-- Username -->
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" ></td>
            </tr>

            <!-- Password -->
            <tr>
                <td>Password:</td>
                <td><input type="password" name="password" ></td>
            </tr>

            <!-- Installation Address -->
            <tr>
                <td>Installation Address:</td>
                <td><textarea name="inst_address" rows="4" cols="50" ></textarea></td>
            </tr>

            <!-- Profile Picture -->
            <tr>
                <td>Profile Picture (Optional):</td>
                <td><input type="file" name="picture" accept="image/*"></td>
            </tr>

            <!-- Terms and Conditions -->
            <tr>
                <td colspan="2">
                    <label>
                        <input type="checkbox" name="terms" > I agree to the terms and conditions
                    </label>
                </td>
            </tr>

            <!-- Submit Button -->
            <tr>
                <td colspan="2">
                    <button type="submit">Register</button>
                    <button type="reset">Clear Form</button>
                </td>
            </tr>
        </form>
    </table>
    <script src="../js/validation.js"></script>
</body>
</html>
