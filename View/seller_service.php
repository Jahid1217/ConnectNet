<?php
require_once '../model/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serviceId = $_POST['service_id'];
    $serviceName = $_POST['service_name'];
    $serviceType = $_POST['service_type'];
    $phoneNumber = $_POST['phone_number'];
    $servicePlan = $_POST['service_plan'];
    $speed = $_POST['speed'];
    $charge = $_POST['charge'];
    $location = $_POST['location'];

    $db = new MyDB();

    if ($db->insertService($serviceId, $serviceName, $serviceType, $phoneNumber, $servicePlan, $speed, $charge, $location)) {
        echo "Service added successfully!";
    } else {
        echo "Failed to add service.";
    }

    $db->closeCon();
}
?>