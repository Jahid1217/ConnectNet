<?php
include "../model/db.php";

$myDB = new MyDB();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete']) && $_POST['delete'] == "true") {
        $sellerId = $_POST['seller_Id'];
        $deleted = $myDB->deleteSeller($sellerId);

        if ($deleted) {
            echo "Account successfully deleted.";
        } else {
            echo "Error deleting account.";
        }
        exit();
    }

    $sellerId = $_POST['seller_Id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $businessName = trim($_POST['businessName']);
    $businessType = trim($_POST['businessType']);
    $location = trim($_POST['location']);

    $oldData = $myDB->getSellerDetails($sellerId);

    if (
        $name === $oldData['name'] &&
        $email === $oldData['email'] &&
        $businessName === $oldData['businessName'] &&
        $businessType === $oldData['businessType'] &&
        $location === $oldData['location']
    ) {
        echo "No new information added.";
    } else {
        $updated = $myDB->updateSeller($sellerId, $name, $email, $businessName, $businessType, $location);

        if ($updated) {
            echo "Information successfully updated.";
        } else {
            echo "Error updating information.";
        }
    }
}
?>
