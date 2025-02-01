<?php
require_once '../model/db.php';

$seller_Id = $_GET['seller_Id'] ?? null;

if (!$seller_Id) {
    echo "Invalid access.";
    exit;
}

// Fetch seller details
$db = new MyDB();
$result = $db->getUserByID("seller", $seller_Id);
$seller = $result->fetch_assoc();
$db->closeCon();

if (!$seller) {
    echo "Seller not found.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <link rel="stylesheet" href="../css/newcss.css">
</head>
<body>
    <h1>Add Service</h1>
    <form action="../control/add_service_control.php" method="POST">
        <!-- Pre-filled values from the seller table -->
        <input type="hidden" name="service_id" value="<?= $seller['seller_Id'] ?>">

        <div class="form-group">
            <label for="service_name">Service Name:</label>
            <input type="text" id="service_name" name="service_name" value="<?= $seller['businessName'] ?>" readonly>
        </div>

        <div class="form-group">
            <label for="serviceType">Service Type:</label>
            <input type="text" id="serviceType" name="serviceType" value="<?= $seller['businessType'] ?>" readonly>
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?= $seller['phoneNumber'] ?>" readonly>
        </div>

        <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" value="<?= $seller['location'] ?>" readonly>
        </div>

        <!-- New values for the service table -->
        <div class="form-group">
            <label for="service_plan">Service Plan:</label>
            <select id="service_plan" name="service_plan" class="input-field">
                <option value="Basic">Basic</option>
                <option value="Primary">Primary</option>
                <option value="Dominant">Dominant</option>
            </select>
        </div>

        <div class="form-group">
            <label for="speed">Speed (Mbps):</label>
            <input type="number" id="speed" name="speed" placeholder="Enter speed in Mbps" class="input-field">
        </div>

        <div class="form-group">
            <label for="charge">Charge (BDT):</label>
            <input type="number" id="charge" name="charge" placeholder="Enter charge in BDT" class="input-field">
        </div>

        <button type="submit">Confirm</button>
    </form>
</body>
</html>
