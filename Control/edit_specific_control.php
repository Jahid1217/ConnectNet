<?php
require_once '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_Id = $_POST['customer_Id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = isset($_POST['inst_address']) ? $_POST['inst_address'] : ''; // Correct field name

    $db = new MyDB();
    $currentCustomer = $db->getCustomerByID($customer_Id)->fetch_assoc();

    // Check if the new data matches the current data
    if (
        $currentCustomer['name'] === $name &&
        $currentCustomer['email'] === $email &&
        $currentCustomer['phone'] === $phone &&
        $currentCustomer['inst_address'] === $address
    ) {
        echo "Please provide new information.";
    } else {
        // Update query to include address
        $sql = "UPDATE customer SET name=?, email=?, phone=?, inst_address=? WHERE customer_Id=?";
        $stmt = $db->conn->prepare($sql);
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $customer_Id);

        if ($stmt->execute()) {
            echo "Customer details updated successfully.";
        } else {
            echo "Error updating customer.";
        }
        $stmt->close();
    }
    $db->closeCon();
}
?>
