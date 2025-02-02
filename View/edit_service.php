<?php
session_start();
include "../model/db.php";

if (!isset($_SESSION["seller_Id"])) {
    header("Location: login.php");
    exit();
}

$serviceName = $_GET['service_name'] ?? null;

if (!$serviceName) {
    echo "Invalid service name.";
    exit();
}

$myDB = new MyDB();
$serviceDetails = $myDB->getServiceDetailsByName($serviceName);

if (!$serviceDetails) {
    echo "Service not found.";
    exit();
}
$serviceTypes = ["BroadBand", "Optical", "DSL"];
$servicePlans = ["Basic", "Primary", "Dominant"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link rel="stylesheet" href="../css/newcss.css">
</head>
<body>
    <h1>Edit Service</h1>
    
    <form action="../control/edit_service_control.php" method="POST">
        <input type="hidden" name="service_id" value="<?php echo $serviceDetails['service_id']; ?>">

        <label>Service Name:</label>
        <input type="text" name="service_name" value="<?php echo htmlspecialchars($serviceDetails['service_name']); ?>" readonly>

        <label>Service Type:</label>
        <select name="serviceType">
            <?php foreach ($serviceTypes as $type): ?>
                <option value="<?php echo $type; ?>" <?php echo ($serviceDetails['serviceType'] == $type) ? 'selected' : ''; ?>>
                    <?php echo $type; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Service Plan:</label>
        <select name="service_plan">
            <?php foreach ($servicePlans as $plan): ?>
                <option value="<?php echo $plan; ?>" <?php echo ($serviceDetails['service_plan'] == $plan) ? 'selected' : ''; ?>>
                    <?php echo $plan; ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label>Speed (Mbps):</label>
        <input type="number" name="speed" value="<?php echo htmlspecialchars($serviceDetails['speed']); ?>">

        <label>Charge (BDT):</label>
        <input type="number" name="charge" value="<?php echo htmlspecialchars($serviceDetails['charge']); ?>">

        <label>Location:</label>
        <input type="text" name="location" value="<?php echo htmlspecialchars($serviceDetails['location']); ?>">

        <button type="submit">Update</button>
        <a href="specific_service_login.php" class="btn btn-cancel">Cancel</a>
    </form>
</body>
</html>
