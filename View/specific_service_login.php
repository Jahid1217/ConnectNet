<?php
session_start();
include "../model/db.php";

if (!isset($_SESSION["seller_Id"])) {
    header("Location: login.php");
    exit();
}

$myDB = new MyDB();
$sellerId = $_SESSION["seller_Id"];
$services = $myDB->getSellerServicesById($sellerId);

$serviceTypes = ["BroadBand", "Optical", "DSL"];
$servicePlans = ["Basic", "Primary", "Dominant"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Services</title>
    <link rel="stylesheet" href="../css/newcss.css">
</head>
<body>
    <h1>Your Services</h1>

    <?php if ($services->num_rows > 0): ?>
        <table class="service-table">
            <tr>
                <th>Service Name</th>
                <th>Type</th>
                <th>Plan</th>
                <th>Speed</th>
                <th>Charge</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $services->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['service_name']); ?></td>
                    <td><?php echo htmlspecialchars($row['serviceType']); ?></td>
                    <td><?php echo htmlspecialchars($row['service_plan']); ?></td>
                    <td><?php echo htmlspecialchars($row['speed']); ?> Mbps</td>
                    <td><?php echo htmlspecialchars($row['charge']); ?> BDT</td>
                    <td><?php echo htmlspecialchars($row['location']); ?></td>
                    <td>
    <form action="edit_service.php" method="GET">
        <input type="hidden" name="service_name" value="<?php echo htmlspecialchars($row['service_name']); ?>">
        <button type="submit" class="btn btn-edit">Edit</button>
    </form>
</td>
                </tr>
            <?php endwhile; ?>
        </table>

        <div class="btn-container">
            <a href="view_orderdet.php"><button class="btn btn-order">View Orders</button></a>
        </div>

    <?php else: ?>
        <p>No services found.</p>
    <?php endif; ?>
</body>
</html>
