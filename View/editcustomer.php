<?php
include_once "../model/db.php";

if (!isset($_GET['customer_Id'])) {
    echo "Customer ID is required.";
    exit();
}

$customer_Id = $_GET['customer_Id'];
$db = new MyDB();
$customer = $db->getCustomerByID($customer_Id)->fetch_assoc();

if (!$customer) {
    echo "Customer not found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
</head>
<body>
    <h1>Edit Customer</h1>
    <form action="../control/editcustomer_control.php" method="POST">
        <input type="hidden" name="customer_Id" value="<?php echo $customer['customer_Id']; ?>">

        <label>Name: <input type="text" name="name" value="<?php echo $customer['name']; ?>" required></label><br>
        <label>Email: <input type="email" name="email" value="<?php echo $customer['email']; ?>" required></label><br>
        <label>Phone: <input type="text" name="phone" value="<?php echo $customer['phone']; ?>" required></label><br>
        <label>Username: <input type="text" name="username" value="<?php echo $customer['username']; ?>" required></label><br>
        <label>Password: <input type="password" name="password" value="<?php echo $customer['password']; ?>" required></label><br>
        <label>Installation Address: <input type="text" name="inst_address" value="<?php echo $customer['inst_address']; ?>" required></label><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>
