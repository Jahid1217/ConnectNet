<?php
require_once "../model/db.php";

$myDB = new MyDB();

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['seller_Id'])) {
    // Fetch user information for confirmation
    $seller_Id = $_GET['seller_Id'];
    $result = $myDB->getUserByID("seller", $seller_Id);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirm_delete'])) {
    // Handle deletion if the user confirms
    $seller_Id = $_POST['seller_Id'];
    $result = $myDB->deleteDataUser($seller_Id, "seller");

    if ($result === 1) {
        header("Location: showuser.php");
        exit();
    } else {
        echo "Error deleting user: $result";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Delete</title>
</head>
<body>
    <?php if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($user)): ?>
        <h1>Are you sure you want to delete this user?</h1>
        <p><strong>Name:</strong> <?= htmlspecialchars($user['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Phone:</strong> <?= htmlspecialchars($user['phoneNumber']) ?></p>
        <p><strong>Business Name:</strong> <?= htmlspecialchars($user['businessName']) ?></p>

        <form method="POST" action="">
            <input type="hidden" name="seller_Id" value="<?= htmlspecialchars($user['seller_Id']) ?>">
            <button type="submit" name="confirm_delete">Yes, Delete</button>
            <a href="showuser.php"><button type="button">Cancel</button></a>
        </form>
    <?php endif; ?>
</body>
</html>
