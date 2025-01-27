<?php

include '../model/db.php';

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
 
    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $update = $mydb->customerDeleteData($id, $conobj);
    if ($update === 1) {
        echo "Data delete successfully";
        header("Location:../view/customer_info.php");
    } else {
        echo "Error deleteing data: " . $update;
    }
} else {
    echo "Invalid ID provided.";
}
?>