<?php
require_once '../model/db.php';

$db = new MyDB();

// Link to your existing CSS file
echo "<head>
    <link rel='stylesheet' href='../css/mycss.css'>
</head>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['edit'])) {
        // Edit operation
        $serviceId = $_POST['service_id'];
        $servicePlan = $_POST['service_plan'];
        $speed = $_POST['speed'];
        $charge = $_POST['charge'];

        // Fetch existing values
        $existingService = $db->getServiceById($serviceId)->fetch_assoc();

        if ($existingService['speed'] == $speed && $existingService['charge'] == $charge) {
            echo "<h1>Kindly Change Information</h1>";
            echo "<p>Please make some changes to update the service.</p>";
        } else {
            if ($db->updateService($serviceId, $servicePlan, $speed, $charge)) {
                echo "<h1>Service Updated Successfully!</h1>";
                echo "<p>Your service details have been updated.</p>";
            } else {
                echo "<h1 style='color: red;'>Failed to Update</h1>";
                echo "<p>There was an issue updating your service. Please try again.</p>";
            }
        }
    } elseif (isset($_POST['delete'])) {
        // Delete operation
        $serviceId = $_POST['service_id'];
        if ($db->deleteService($serviceId)) {
            echo "<h1>Service Deleted Successfully!</h1>";
            echo "<p>The service has been removed from the database.</p>";
            echo "<a href='../view/service.php'><button class='back-button'>View All Services</button></a>";
        } else {
            echo "<h1 style='color: red;'>Failed to Delete</h1>";
            echo "<p>Something went wrong while deleting your service.</p>";
        }
    }
}

$db->closeCon();

// Back button to redirect to specific_service.php
echo "<a href='../view/specific_service.php?seller_Id={$serviceId}'><button class='back-button'>View Update</button></a>";
?>
