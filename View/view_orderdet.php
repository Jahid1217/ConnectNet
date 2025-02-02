<?php
session_start();
include "../control/orderdet_control.php";

if (!isset($_SESSION["seller_Id"])) {
    header("Location: login.php");
    exit();
}

$sellerId = $_SESSION["seller_Id"];
$orderDetails = getOrderDetailsByServiceId($sellerId);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="../css/newcss.css">
</head>
<body>
    <h1>Order Details</h1>

    <?php if ($orderDetails->num_rows > 0): ?>
        <table class="service-table">
            <tr>
                <th>Order ID</th>
                <th>Customer ID</th>
                <th>Service Plan</th>
                <th>Service Type</th>
                <th>Description</th>
                <th>Installation Address</th>
            </tr>
            <?php while ($row = $orderDetails->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['orderDet_Id']); ?></td>
                    <td><?php echo htmlspecialchars($row['customer_Id']); ?></td>
                    <td><?php echo htmlspecialchars($row['service_plan']); ?></td>
                    <td><?php echo htmlspecialchars($row['service_type']); ?></td>
                    <td><?php echo htmlspecialchars($row['ord_description']); ?></td>
                    <td><?php echo htmlspecialchars($row['inst_address']); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No orders yet.</p>
    <?php endif; ?>
</body>
</html>
