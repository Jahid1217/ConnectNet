<?php
session_start();
require_once '../model/db.php';

// ✅ Ensure customer is logged in
if (!isset($_SESSION['customer_Id'])) {
    echo "<script>alert('Customer session not found. Please login again.'); window.location.href = '../view/customer.php';</script>";
    exit();
}

$customer_Id = $_SESSION['customer_Id'];
$customer_name = $_SESSION['customer_name']; // Ensure customer name is stored

class CustomerService {
    public function displayServices($customer_Id, $customer_name) {
        $db = new MyDB();
        $result = $db->getAllServices(); 
        $db->closeCon();

        if ($result->num_rows > 0) {
            echo "<h1 class='title'>Available Services</h1>";
            echo "<form action='../view/customer_transaction.php' method='POST'>";
            echo "<input type='hidden' name='customer_Id' value='$customer_Id'>"; 
            echo "<input type='hidden' name='customer_name' value='$customer_name'>";
            echo "<table class='service-table'>";  
            echo "<thead>
                    <tr>
                        <th>Select</th>
                        <th>Service ID</th>
                        <th>Service Name</th>
                        <th>Service Type</th>
                        <th>Phone Number</th>
                        <th>Service Plan</th>
                        <th>Speed (Mbps)</th>
                        <th>Charge (BDT)</th>
                        <th>Location</th>
                    </tr>
                  </thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td><input type='radio' name='selected_service' value='{$row['service_id']}' required></td>
                        <td>{$row['service_id']}</td>
                        <td>{$row['service_name']}</td>
                        <td>{$row['serviceType']}</td>
                        <td>{$row['phone_number']}</td>
                        <td>{$row['service_plan']}</td>
                        <td>{$row['speed']}</td>
                        <td>{$row['charge']}</td>
                        <td>{$row['location']}</td>
                      </tr>";
            }
            echo "</tbody></table>";

            echo "<div class='button-container'>";
            echo "<button type='submit' class='proceed-button'>Proceed</button>";
            echo "</div>";
            echo "</form>";
        } else {
            echo "<p class='no-services'>No services available.</p>";
        }
    }
}

$customerService = new CustomerService();
$customerService->displayServices($customer_Id, $customer_name);
?>
<link rel="stylesheet" href="../css/mystyle.css">