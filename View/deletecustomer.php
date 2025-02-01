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
    <title>Delete Customer</title>
</head>
<body>
    <h1>Delete Customer</h1>
    <p>Are you sure you want to delete this customer?</p>
    <p>Name: <?php echo $customer['name']; ?></p>
    <form action="../control/deletecustomer_control.php" method="POST">
        <input type="hidden" name="customer_Id" value="<?php echo $customer['customer_Id']; ?>">
        <button type="submit">Confirm</button>
    </form>
    <a href="showcustomer.php">Cancel</a>
</body>
</html>
