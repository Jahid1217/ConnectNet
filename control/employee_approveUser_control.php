<?php

include '../model/db.php';

// Validate and sanitize the input
if (isset($_GET["id"])) {
    $id = ($_GET["id"]); // Convert the id to an integer for safety

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->searchUserByIdByEmployee($conobj, $id);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            $id = $data["employee_Id"];
            $Name = $data["name"];
            $email = $data["email"];
            $userName = $data["username"];
            $dateOfBirth = $data["DOB"];
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
    $update = $mydb->employeeUpdateDataUser($id,$userName,$password, $conobj);
    if ($update === 1) {
        echo "Data updated successfully";
        header("Location:../view/employee_info.php");
    } else {
        echo "Error updating data: " . $update;
    }
}
?>