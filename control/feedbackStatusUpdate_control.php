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
        header("Location: ../view/feedback_view.php");
    } else {
        echo "Error updating data!";
    }
    $mydb->conClose($conobj);
    } 
}
?>
<br>
<a href="../view/feedback_view.php">Back to Feedback View</a>
