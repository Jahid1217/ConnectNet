<?php
// File: service.php (Under view folder)

require_once '../model/db.php';

class SellerService {
    public function displayServices() {
        $db = new MyDB();
        $result = $db->getAllSellerServices(); // Fetch services from the seller table
        $db->closeCon();

        if ($result->num_rows > 0) {
            echo "<h1>Available Services</h1>";
            echo "<table class='service-table'>";  
            echo "<thead>
                    <tr>
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
        } else {
            echo "<p>No services found.</p>";
        }
    }
}

// Create an instance of SellerService and display the services
$sellerService = new SellerService();
$sellerService->displayServices();
?>
<head>
    <link rel="stylesheet" href="../css/newcss.css">
</head>
