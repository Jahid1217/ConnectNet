<?php
require_once '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_Id = $_POST['customer_Id'];
    $db = new MyDB();

    $sql = "DELETE FROM customer WHERE customer_Id=?";
    $stmt = $db->conn->prepare($sql);
    $stmt->bind_param("i", $customer_Id);

    if ($stmt->execute()) {
        echo "Customer deleted successfully.";
    } else {
        echo "Error deleting customer.";
    }
    $stmt->close();
    $db->closeCon();
}
?>
