<?php
session_start();
require_once '../model/db.php';

// ✅ Ensure customer session exists
if (!isset($_SESSION['customer_Id'])) {
    echo "<script>alert('Customer session not found. Please login again.'); window.location.href = '../view/customer.php';</script>";
    exit();
}

$customer_Id = $_SESSION['customer_Id'];
$db = new MyDB();
$orders = $db->getOrderDetailsByCustomer($customer_Id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Order Details</title>
    <link rel="stylesheet" href="../css/mystyle.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f8f8f8;
        }
        table {
            width: 80%;
            margin: auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        p {
            font-size: 18px;
            color: red;
        }
    </style>
</head>
<body>

    <h1>My Order Details</h1>

    <?php if ($orders->num_rows > 0): ?>
        <table>
        <thead>
    <tr>
        <th>Order ID</th>
        <th>Service Name</th>
        <th>Service Plan</th>
        <th>Service Type</th>
        <th>Speed</th>
        <th>Charge</th>
        <th>Description</th>
        <th>Installation Address</th>
    </tr>
</thead>
<tbody>
    <?php while ($row = $orders->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($row['orderDet_Id']) ?></td>
            <td><?= htmlspecialchars($row['service_name']) ?></td>
            <td><?= htmlspecialchars($row['service_plan']) ?></td>
            <td><?= htmlspecialchars($row['service_type']) ?></td>
            <td><?= htmlspecialchars($row['speed']) ?> Mbps</td>
            <td><?= htmlspecialchars($row['charge']) ?> BDT</td>
            <td><?= htmlspecialchars($row['ord_description']) ?></td>
            <td><?= htmlspecialchars($row['inst_address']) ?></td>
        </tr>
    <?php endwhile; ?>
</tbody>
        </table>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>

</body>
</html>
