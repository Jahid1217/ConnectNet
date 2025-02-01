<?php
require_once '../model/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $serviceId = $data['service_id'];
    $servicePlan = $data['service_plan'];
    $speed = $data['speed'];
    $charge = $data['charge'];

    $db = new MyDB();
    if ($db->updateService($serviceId, $servicePlan, $speed, $charge)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
    $db->closeCon();
}
?>
