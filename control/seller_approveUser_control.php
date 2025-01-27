<?php

include '../model/db.php';

// Validate and sanitize the input
if (isset($_GET["id"])) {
    $id = ($_GET["id"]); // Convert the id to an integer for safety

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->searchUserByIdBySeller($conobj, $id);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            $id = $data["seller_Id"];
            $Name = $data["name"];
            $email = $data["email"];
            $userName = $data["username"];
            $gender = $data["gender"];
            $phoneNumber = $data["phoneNumber"];
            $password = $data["password"];
            $location = $data["location"];
        }
    } else {
        echo "No Data Available";
    }

    $conobj->close();
} else {
    echo "Invalid ID provided.";
}

if (isset($_POST["update"])){
    $id = $_POST["id"];
    $userName = $_POST["username"];
    $password = $_POST["password"];
    
    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $update = $mydb->sellerUpdateDataUser($id,$userName,$password, $conobj);
    if ($update === 1) {
        echo "Data updated successfully";
        header("Location:../view/seller_info.php");
    } else {
        echo "Error updating data: " . $update;
    }
}
?>