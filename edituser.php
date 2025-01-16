<?php
include_once "../model/db.php"; // Include the database connection file

// Check if 'seller_Id' is passed through the URL (GET request)
if (!isset($_GET['seller_Id'])) {
    echo "Seller ID is required.";
    exit();
}

// Get the seller_Id from the URL parameter
$seller_Id = $_GET['seller_Id'];

// Create a new instance of the MyDB class and get the connection
$db = new MyDB();
$conn = $db->conn; // Access the connection through the property

// Fetch existing seller data using seller_Id
$seller_data = $db->getUserByID("seller", $conn, $seller_Id)->fetch_assoc();

// Check if seller data is returned
if (!$seller_data) {
    echo "No seller data found for the given ID.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Seller Information</title>
</head>
<body>
    <h1>Edit Your Information</h1>
    <form action="../control/edituser_control.php" method="POST">
        <input type="hidden" name="seller_Id" value="<?php echo htmlspecialchars($seller_Id); ?>">

        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($seller_data['name']); ?>"><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($seller_data['email']); ?>"><br>

        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone" value="<?php echo htmlspecialchars($seller_data['phoneNumber']); ?>"><br>

        <label for="gender">Gender:</label>
        <input type="radio" name="gender" value="Male" <?php echo ($seller_data['gender'] == 'Male') ? 'checked' : ''; ?>> Male
        <input type="radio" name="gender" value="Female" <?php echo ($seller_data['gender'] == 'Female') ? 'checked' : ''; ?>> Female
        <input type="radio" name="gender" value="Other" <?php echo ($seller_data['gender'] == 'Other') ? 'checked' : ''; ?>> Other<br>

        <label for="business_name">Business Name:</label>
        <input type="text" name="business_name" id="business_name" value="<?php echo htmlspecialchars($seller_data['businessName']); ?>"><br>

        <label for="business_type">Business Type:</label>
        <select name="business_type" id="business_type">
            <option value="BroadBand" <?php echo ($seller_data['businessType'] == 'BroadBand') ? 'selected' : ''; ?>>BroadBand</option>
            <option value="Optical" <?php echo ($seller_data['businessType'] == 'Optical') ? 'selected' : ''; ?>>Optical</option>
            <option value="DSL" <?php echo ($seller_data['businessType'] == 'DSL') ? 'selected' : ''; ?>>DSL</option>
        </select><br>

        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="<?php echo htmlspecialchars($seller_data['location']); ?>"><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" placeholder="Enter new password (leave empty to keep current)"><br>

        <button type="submit">Update Information</button>
    </form>
</body>
</html>
