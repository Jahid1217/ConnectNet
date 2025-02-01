<?php
include_once "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new MyDB();
    
    $data = [
        'customer_Id' => $_POST['customer_Id'],
        'name' => $_POST['name'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
        'username' => $_POST['username'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // Secure password hashing
        'inst_address' => $_POST['inst_address'],
    ];

    $result = $db->updateCustomer($data);

    if ($result) {
        header("Location: ../view/showcustomer.php");
        exit();
    } else {
        echo "Error updating customer.";
    }
}
?>
