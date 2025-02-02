<?php
include "../model/db.php";

function getOrderDetailsByServiceId($sellerId) {
    $myDB = new MyDB();
    return $myDB->getOrderDetailsByServiceId($sellerId);
}
?>
