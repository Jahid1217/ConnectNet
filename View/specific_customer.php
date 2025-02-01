<?php
require_once '../model/db.php';
session_start(); // Start the session

if (!isset($_GET['customer_Id'])) {
    echo "Customer ID is required.";
    exit();
}

$customer_Id = $_GET['customer_Id'];
$_SESSION['customer_Id'] = $customer_Id; // Store customer ID in session

$db = new MyDB();
$customer = $db->getCustomerByID($customer_Id)->fetch_assoc();

if (!$customer) {
    echo "Customer not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Details</title>
    <link rel="stylesheet" href="../css/mystyle.css"> <!-- External CSS for styling -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
    <script src="../js/ajax_specific.js"></script> <!-- AJAX Operations -->
</head>
<body>
    <h1>Hi, <?php echo htmlspecialchars($customer['username']); ?>!</h1>

    <table style="margin: auto;"> <!-- Center the table -->
        <tr><td><strong>Name:</strong></td><td><input type="text" id="name" name="name" value="<?php echo htmlspecialchars($customer['name']); ?>"></td></tr>
        <tr><td><strong>Email:</strong></td><td><input type="email" id="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>"></td></tr>
        <tr><td><strong>Phone:</strong></td><td><input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($customer['phone']); ?>"></td></tr>
        <tr><td><strong>Address:</strong></td><td><input type="text" id="address" name="inst_address" value="<?php echo htmlspecialchars($customer['inst_address']); ?>"></td></tr>
        <tr style="display: none;"><td colspan="2"><input type="hidden" id="customer_Id" name="customer_Id" value="<?php echo $customer['customer_Id']; ?>"></td></tr>
    </table>

    <!-- Center Align Buttons -->
    <div style="display: flex; justify-content: center; align-items: center; gap: 15px; margin-top: 20px;">
        <button id="editCustomer" style="background-color: green; color: white; padding: 10px 20px; border-radius: 10px; border: none; cursor: pointer;">Edit</button>
        <button id="deleteCustomer" style="background-color: red; color: white; padding: 10px 20px; border-radius: 10px; border: none; cursor: pointer;">Delete</button>
        
        <!-- Pass customer_Id to customer_service.php -->
        <a href="customer_service.php" style="text-decoration: none;">
            <button style="background-color: green; color: white; padding: 10px 20px; border-radius: 10px; border: none; cursor: pointer;">View Services</button>
        </a>

        <a href="../view/customer.php" style="text-decoration: none;">
            <button style="background-color: blue; color: white; padding: 10px 20px; border-radius: 10px; border: none; cursor: pointer;">Logout</button>
        </a>
    </div>

    <div id="responseMessage" style="text-align:center; margin-top:10px; color:red;"></div>
</body>
</html>
