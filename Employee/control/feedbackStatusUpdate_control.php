<?php
include '../database/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $feedbackId = $_POST['feedbackId'];
    $status = $_POST['status'];

    if (!empty($feedbackId) && !empty($status)) {
        $mydb = new myDB();
        $conobj = $mydb->openCon();

        $update = $mydb->feedbackStatusUpdate($feedbackId, $status, $conobj);
    
    if ($update === 1) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data!";
    }
    
    $mydb->conClose($conobj);
    } 
}
?>
