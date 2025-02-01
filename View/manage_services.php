<?php
session_start();

if (!isset($_SESSION['seller_Id'])) {
    echo "No seller ID found. Please log in first.";
    exit;
}

$seller_Id = $_SESSION['seller_Id'];

require_once '../model/db.php';

$db = new MyDB();
$services = $db->getServicesBySellerId($seller_Id);
$db->closeCon();

if ($services->num_rows > 0) {
    echo "<h1>Your Services</h1>";
    echo "<table border='1'>";
    echo "<tr>
            <th>Service ID</th>
            <th>Service Name</th>
            <th>Service Type</th>
            <th>Phone</th>
            <th>Plan</th>
            <th>Speed</th>
            <th>Charge</th>
            <th>Location</th>
            <th>Actions</th>
          </tr>";
    while ($service = $services->fetch_assoc()) {
        echo "<tr>
                <td>{$service['service_id']}</td>
                <td>{$service['service_name']}</td>
                <td>{$service['serviceType']}</td>
                <td>{$service['phone_number']}</td>
                <td>{$service['service_plan']}</td>
                <td>{$service['speed']}</td>
                <td>{$service['charge']}</td>
                <td>{$service['location']}</td>
                <td>
                    <button class='edit-service' data-id='{$service['service_id']}'>Edit</button>
                    <button class='delete-service' data-id='{$service['service_id']}'>Delete</button>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No services available.</p>";
}
?>
<script src="../js/service_operations.js"></script>
