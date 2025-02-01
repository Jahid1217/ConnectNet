<?php
include_once "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_Id = $_POST['customer_Id'];
    $db = new MyDB();
    $result = $db->deleteCustomerByID($customer_Id);

    if ($result) {
        header("Location: ../view/showcustomer.php");
        exit();
    } else {
        echo "Error deleting customer.";
    }
}
?>
