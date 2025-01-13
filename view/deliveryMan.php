<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Employee Information</h1>
<form action="form">
        <fieldset>
            <legend>Employee Information & Details</legend>
            <table>
                <tr>
                    <td>Full Name:</td>
                    <td><input type="text" name="Full Name" placeholder="Full Name"></td>
                </tr>
                
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="Email"placeholder="Email"></td>
                </tr>
                <tr>
                    <td>Phone No:</td>
                    <td><input type="text" name="Phone No"placeholder="Phone No"></td>
                </tr>
                <tr>
                    <td>Date of Birth:</td>
                    <td><input type="date" name="Birth Date"></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><textarea name="Address"rows="2" cols="21"></textarea></td>
                </tr>
                <tr>
                    <td>Role:</td>
                    <td>
                    <select id="role" name="Role">
                        <option value="">Select Role</option>
                        <option value="1">Technician</option>
                        <option value="2">Customer Support</option>
                        <option value="3">Sales Rep.</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td>
                    <select id="Department" name="Department">
                        <option value="">Select Department</option>
                        <option value="1">Technical Support</option>
                        <option value="2">Sales</option>
                        <option value="3">Billing</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td>User Name:</td>
                    <td><input type="text" name="User Name" placeholder="User Name"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" id="myFile" name="Password"placeholder="Password"></td>
                </tr>
                <tr>
                    <td>Confirm Password:</td>
                    <td><input type="password" id="myFile" name="Confirm_Password"placeholder="Confirm_Password"></td>
                </tr>
                <tr>
                    <td>Supervisor/Manager:</td>
                    <td><input type="checkbox" name="yes" id="yes">Yes</td>
                </tr>
                <tr>
                    <td>Employee Type:</td>
                    <td>
                        <input type="radio" name="Emptype" value= "1">Full-Time
                        <input type="radio" name="Emptype" value= "2">Part-Time
                        <input type="radio" name="Emptype" value= "3">Contract
                    </td>
                </tr>
                <tr>
                    <td>CV:</td>
                    <td><label for="myfile"></label>
                    <input type="file" id="myfile" name="myfile"></td>
                </tr>
                <tr>
                    <td><label>
                    <input type="checkbox" name="terms" required> I agree to the <a href="terms-and-conditions.html" target="_blank">Terms and Conditions</a>.
                    </label>
                </td>
                </tr>

               
            </table>
            
        </fieldset>
             <input type="submit"value="Create Product">
             <input type="reset"value="Clear Form">
    </form>
</body>
</html>