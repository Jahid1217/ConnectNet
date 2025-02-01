<?php
session_start();
require_once '../model/db.php';

// ✅ Ensure customer session exists
if (!isset($_SESSION['customer_Id'])) {
    echo "<script>alert('Customer session not found. Please login again.'); window.location.href = '../view/customer.php';</script>";
    exit();
}

// ✅ Ensure service is selected
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['selected_service'] = $_POST['selected_service'];
    $_SESSION['customer_Id'] = $_POST['customer_Id'];
}

$customer_Id = $_SESSION['customer_Id'];
$serviceId = $_SESSION['selected_service'];

$db = new MyDB();
$serviceDetails = $db->getServiceById($serviceId)->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Order</title>
    <link rel="stylesheet" href="../css/mystyle.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f8f8;
        }
        table {
            width: 60%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            padding: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        td, th {
            padding: 12px;
            border: 1px solid #ddd;
        }
        button {
            background-color: green;
            color: white;
            padding: 10px 15px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            margin-top: 15px;
        }
        button:hover {
            background-color: darkgreen;
        }
        select, input {
            padding: 10px;
            width: 50%;
            margin: 5px 0;
        }
    </style>
</head>
<body>

    <h1>Confirm Your Order</h1>

    <table>
        <tr><td><strong>Customer ID:</strong></td><td><?php echo htmlspecialchars($customer_Id); ?></td></tr>
        <tr><td><strong>Service ID:</strong></td><td><?php echo htmlspecialchars($serviceId); ?></td></tr>
        <tr><td><strong>Service Name:</strong></td><td><?php echo htmlspecialchars($serviceDetails['service_name']); ?></td></tr>
        <tr><td><strong>Service Type:</strong></td><td><?php echo htmlspecialchars($serviceDetails['serviceType']); ?></td></tr>
        <tr><td><strong>Speed:</strong></td><td><?php echo htmlspecialchars($serviceDetails['speed']); ?> Mbps</td></tr>
        <tr><td><strong>Charge:</strong></td><td><?php echo htmlspecialchars($serviceDetails['charge']); ?> BDT</td></tr>
        <tr><td><strong>Location:</strong></td><td><?php echo htmlspecialchars($serviceDetails['location']); ?></td></tr>
    </table>

    <h2>Order & Payment Details</h2>

    <form action="../control/transaction_control.php" method="POST">
        <input type="hidden" name="customer_Id" value="<?php echo $customer_Id; ?>">
        <input type="hidden" name="service_id" value="<?php echo $serviceId; ?>">

        <label><strong>Order Date:</strong></label>
        <input type="date" name="order_date" >

        <label><strong>Payment Method:</strong></label>
        <select name="payment_method" id="payment_method" >
            <option value="Cash on Delivery">Cash on Delivery</option>
            <option value="Card Payment">Card Payment</option>
        </select>

        <div id="card_details" style="display: none;">
            <label><strong>Card Number:</strong></label>
            <input type="text" name="card_number">

            <label><strong>Card Holder Name:</strong></label>
            <input type="text" name="card_holder_name">

            <label><strong>Expiry Date:</strong></label>
            <input type="date" name="exp_date">
        </div>

        <button type="submit">Confirm Order</button>
    </form>

    <script>
        document.getElementById("payment_method").addEventListener("change", function() {
            document.getElementById("card_details").style.display = this.value === "Card Payment" ? "block" : "none";
        });
    </script>

</body>
</html>
