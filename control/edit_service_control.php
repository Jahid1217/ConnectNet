<?php
session_start();
include "../model/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $serviceId = $_POST['service_id'];
    $serviceName = trim($_POST['service_name']);
    $serviceType = trim($_POST['serviceType']);
    $servicePlan = trim($_POST['service_plan']);
    $speed = trim($_POST['speed']);
    $charge = trim($_POST['charge']);
    $location = trim($_POST['location']);

    $myDB = new MyDB();
    $oldData = $myDB->getServiceDetails($serviceId);

    if (
        $serviceType === $oldData['serviceType'] &&
        $servicePlan === $oldData['service_plan'] &&
        $speed == $oldData['speed'] &&
        $charge == $oldData['charge'] &&
        $location === $oldData['location']
    ) {
        echo "<script>
                alert('Please provide new information.');
                window.location.href = '../view/edit_service.php?service_id={$serviceId}';
              </script>";
        exit();
    }

    $updated = $myDB->updateServiceDetails($serviceId, $serviceName, $serviceType, $servicePlan, $speed, $charge, $location);

    if ($updated) {
        echo "<script>
                alert('Service information successfully updated.');
                window.location.href = '../view/specific_service_login.php';
              </script>";
    } else {
        echo "<script>
                alert('Error updating service information.');
                window.location.href = '../view/edit_service.php?service_id={$serviceId}';
              </script>";
    }
}
?>
