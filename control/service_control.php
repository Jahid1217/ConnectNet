<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servicePlan = $_POST['service_plan'];
    $errors = [];

    if (empty($servicePlan)) {
        $errors['service_plan'] = "Service plan must be selected.";
    }

    if (!empty($errors)) {
        echo json_encode(['status' => 'error', 'errors' => $errors]);
        exit();
    } else {
        echo json_encode(['status' => 'success']);
        exit();
    }
}
?>