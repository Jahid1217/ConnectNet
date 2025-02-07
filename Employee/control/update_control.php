<?php

include '../database/db.php';

// Validate and sanitize the input
if ($_REQUEST["id"]) {
    $id = intval($_GET["id"]); // Convert the id to an integer for safety

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->getUserByID("employee", $conobj, $id);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            $id = $data["employee_Id"];
            $Name = $data["name"];
            $email = $data["email"];
            $password = $data["password"];
            $dateOfBirth = $data["DOB"];
            $phoneNumber = $data["phoneNumber"];
            $location = $data["location"];
        }
    } else {
        echo "No Data Available";
    }

    $conobj->close();
} else {
    echo "Invalid ID provided.";
}

if (isset($_POST["update"])) {

    $id = $_POST["employee_Id"];
    $Name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $dateOfBirth = $_POST["dob"];
    $phoneNumber = $_POST["phone"];
    $location = $_POST["address"];
    
    $mydb = new myDB();
    $conobj = $mydb->openCon();
    
    $update = $mydb->updateDataUser("employee", $conobj, $id, $Name, $email, $password, $dateOfBirth, $phoneNumber, $location);
    
    if ($update === 1) {
        echo "Data updated successfully!";
    } else {
        echo "Error updating data!";
    }
    
    $mydb->conClose($conobj);
}

?>