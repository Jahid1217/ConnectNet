<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration</title>
</head>
<body>
    


<img src="../images/seller.jpg" alt=""  width="200" height="130">
    <h1>Seller Registration Form</h1>
    <table>
    
    <link rel="stylesheet" href="../css/mycss.css">
    <form action="../control/reg_control.php" method="POST" >
    


    
        <!-- Seller Name -->
        <tr>
        <td>Provider Name: </td> <td><input type="text" id="seller_name" name="seller_name" ></td>
</tr>
        
        <!-- Email -->
        <tr>
       
        <td>Email Address:</td> <td><input type="email" id="email" name="email" ></td>
</tr>

        <!-- Phone Number -->
         <tr>
       
        <td>Phone Number:</td> <td><input type="tel" id="phone" name="phone"  placeholder="11-digit phone number" ></td>
</tr>
    <!-- Gender Selection -->
<tr>
    <td>Gender:</td>
    <td>
        <input type="radio" id="male" name="gender" value="Male">Male
       

        <input type="radio" id="female" name="gender" value="Female">Female
        

        <input type="radio" id="other" name="gender" value="Other">Others
        
    </td>
</tr>

        <!-- Business Name -->
        <tr>
       <td> Business Name:</td> <td><input type="text" id="business_name" name="business_name" ></td>
</tr>

        <!-- Business Type -->
         <tr>
       <td> <label for="business_type">Business Type:</label></td>
       <td> <select id="business_type" name="business_type" >
            <option value="BroadBand">Broad Band</option>
            <option value="Optical">Optical</option>
            <option value="dsl">DSL</option>
            
        </select></td>
</tr>

        <!-- Address -->
        <tr>
        <td>Provider Address: </td><td><textarea id="address" name="address" rows="4" cols="50" ></textarea></td>
</tr>


        <!-- Password -->
       <tr>
       <td> Password:</td><td> <input type="password" id="password" name="password" placeholder = "Must be 8 characters"></td>
</tr>

        <!-- Confirm Password -->
        <tr>
       <td> Confirm password:</td> <td><input type="password" id="confirm_password" name="confirm_password" ></td>
</tr>

        <!-- Terms and Conditions -->
         <tr>
        <td colspan ="2"><label for="terms">
            <input type="checkbox" id="terms" name="terms" > I agree to the terms and conditions
        </label></td>
</tr>

        <!-- Submit Button -->
         <tr>
        <td colspan = "2"><button type="submit">Register</button>
        <input type="reset" value="Clear"></td>
</tr>
    </form>
</table>
<script src="../js/form_validation.js"></script>
</body>
</html>