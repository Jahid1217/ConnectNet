<?php

include '../model/db.php';

// Validate and sanitize the input
if (isset($_GET["id"])) {
    $id = intval($_GET["id"]); // Convert the id to an integer for safety

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->getUserByID("admin", $conobj, $id);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
           $id = $data["id"];
            $Name = $data["name"];
            $email = $data["email"];
            $userName = $data["userName"];
            $dateOfBirth = $data["DOB"];
            $phoneNumber = $data["phoneNumber"];
            $password = $data["password"];
            $adminRole = $data["adminRole"];
            $location = $data["location"];
            $profile_Picture = $data["picture"];
            $referenceName = $data["referenceName"];
            $referenceEmail = $data["referenceEmail"];
            $referencePhone = $data["referencePhone"];
            $referenceNameTwo = $data["referenceNameTwo"];
            $referenceEmailTwo = $data["referenceEmailTwo"];
            $referencePhoneTwo = $data["referencePhoneTwo"];
        }
    } else {
        echo "No Data Available";
    }

    $conobj->close();
} else {
    echo "Invalid ID provided.";
}
if (isset($_POST["delete"])) {
    $id = $_POST["id"];
    
    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $update = $mydb->deleteData($id, "admin", $conobj);
    if ($update === 1) {
        echo "Data delete successfully";
        header("Location:../view/showuser.php");
    } else {
        echo "Error deleteing data: " . $update;
    }
}
?>