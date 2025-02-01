<?php
require_once "../model/db.php";

$myDB = new MyDB();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['seller_Id'])) {
    $seller_Id = $_GET['seller_Id'];
    $result = $myDB->getUserByID("seller", $seller_Id);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "Seller not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $seller_Id = $_POST['seller_Id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $business_name = $_POST['business_name'];
    $business_type = $_POST['business_type'];
    $location = $_POST['location'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $result = $myDB->updateDataUser($seller_Id, $name, $email, $phone, $gender, $business_name, $business_type, $location, $password, "seller");

    if ($result === 1) {
        header("Location: showuser.php");
        exit();
    } else {
        echo "Error updating user: $result";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <?php if (isset($user)): ?>
    <form method="POST">
        <input type="hidden" name="seller_Id" value="<?= htmlspecialchars($user['seller_Id']) ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?= htmlspecialchars($user['name']) ?>">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?= htmlspecialchars($user['email']) ?>">
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" value="<?= htmlspecialchars($user['phoneNumber']) ?>">
        <br>
        <label for="gender">Gender:</label>
        <select name="gender" id="gender">
            <option value="Male" <?= $user['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
            <option value="Female" <?= $user['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
        </select>
        <br>
        <label for="business_name">Business Name:</label>
        <input type="text" name="business_name" id="business_name" value="<?= htmlspecialchars($user['businessName']) ?>">
        <br>
        <label for="business_type">Business Type:</label>
        <input type="text" name="business_type" id="business_type" value="<?= htmlspecialchars($user['businessType']) ?>">
        <br>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="<?= htmlspecialchars($user['location']) ?>">
        <br>
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password">
        <br>
        <button type="submit">Update</button>
    </form>
    <?php endif; ?>
</body>
</html>
