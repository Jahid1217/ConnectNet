<?php
include_once "../model/db.php"; // Include the database connection file

if (!isset($_GET['seller_Id'])) {
    echo "Seller ID is required.";
    exit();
}

$seller_Id = $_GET['seller_Id'];
$db = new MyDB(); // Instantiate MyDB class
$conn = $db->conn; // Use the $conn property directly

// Fetch seller data by seller_Id (make sure to match column name 'seller_Id')
$seller_data = $db->getUserByID("seller", $conn, $seller_Id)->fetch_assoc();

if (!$seller_data) {
    echo "Seller not found.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Seller</title>
</head>
<body>
    <h1>Delete Seller</h1>
    <p>Are you sure you want to delete the following seller?</p>

    <ul>
        <li>Name: <?php echo htmlspecialchars($seller_data['name']); ?></li>
        <li>Email: <?php echo htmlspecialchars($seller_data['email']); ?></li>
        <li>Phone: <?php echo htmlspecialchars($seller_data['phoneNumber']); ?></li>
        <li>Location: <?php echo htmlspecialchars($seller_data['location']); ?></li>
    </ul>

    <form action="../control/deleteuser_control.php" method="POST">
        <input type="hidden" name="seller_id" value="<?php echo htmlspecialchars($seller_Id); ?>">
        <button type="submit" name="confirm_delete">Confirm Delete</button>
        <a href="showuser.php">Cancel</a>
    </form>
</body>
</html>
