<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
</head>
<body>
    
    <h1>Customer Registration Form</h1>
    <table>
    
    <form>
        
        <!-- Full Name -->
        <tr>
        <td>Full Name: </td> <td><input type="text" id="full_name" name="full_name" required></td>
        </tr>
        
        <!-- Username -->
        <tr>
        <td>Username:</td> <td><input type="text" id="username" name="username" required></td>
        </tr>

        <!-- Email -->
        <tr>
        <td>Email Address:</td> <td><input type="email" id="email" name="email" required></td>
        </tr>

        <!-- Phone Number -->
        <tr>
        <td>Phone Number:</td> <td><input type="tel" id="phone" name="phone" pattern="[0-9]{10}" placeholder="10-digit phone number" required></td>
        </tr>

        <!-- Billing Address -->
        <tr>
        <td>Billing Address:</td> <td><textarea id="billing_address" name="billing_address" rows="4" cols="50" required></textarea></td>
        </tr>

        <!-- Service Plan -->
        <tr>
        <td>Service Plan:</td>
        <td>
            <select id="service_plan" name="service_plan" required>
                <option value="basic_plan">Basic Plan</option>
                <option value="premium_plan">Premium Plan</option>
                <option value="business_plan">Business Plan</option>
                <option value="enterprise_plan">Enterprise Plan</option>
            </select>
        </td>
        </tr>

        <!-- Preferred Payment Method -->
        <tr>
        <td>Preferred Payment Method:</td>
        <td>
            <select id="payment_method" name="payment_method" required>
                <option value="credit_card">Credit Card</option>
                <option value="paypal">PayPal</option>
                <option value="bank_transfer">Bank Transfer</option>
            </select>
        </td>
        </tr>

        <!-- Installation Address -->
        <tr>
        <td>Installation Address:</td> <td><textarea id="installation_address" name="installation_address" rows="4" cols="50" required></textarea></td>
        </tr>

        <!-- Preferred Installation Date -->
        <tr>
        <td>Preferred Installation Date:</td> <td><input type="date" id="installation_date" name="installation_date" required></td>
        </tr>

        <!-- Terms and Conditions -->
        <tr>
        <td><label for="terms">
            <input type="checkbox" id="terms" name="terms" required> I agree to the terms and conditions
        </label></td>
        </tr>

        

        <!-- Profile Picture (Optional) -->
        <tr>
        <td>Profile Picture (Optional):</td> 
        <td><input type="file" id="profile_picture" name="profile_picture" accept="image/*"></td>
        </tr>

        <!-- Emergency Contact (Optional) -->
        <tr>
        <td>Emergency Contact (Optional):</td> <td><input type="tel" id="emergency_contact" name="emergency_contact" pattern="[0-9]{10}" placeholder="10-digit emergency contact"></td>
        </tr>

        <!-- Submit Button -->
        <tr>
        <td><button type="submit">Register as Customer</button></td>
        </tr>
    </form>
    </table>
    
   

</body>
</html>
