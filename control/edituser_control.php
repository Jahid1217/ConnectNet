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

if (isset($_POST["update"])){
    $id = $_POST["id"];
    $Name = $_POST["name"];
    $email = $_POST["email"];
    $userName = $_POST["username"];
    $dateOfBirth = $_POST["dob"];
    $phoneNumber = $_POST["phone"];
    $password = $_POST["password"];
    $adminRole = $_POST["role"];
    $location = $_POST["address"];
    $profile_Picture = $_POST["profile"];
    $referenceName = $_POST["reference_name"];
    $referenceEmail = $_POST["reference_email"];
    $referencePhone = $_POST["reference_phone"];
    $referenceNameTwo = $_POST["reference_name_two"];
    $referenceEmailTwo = $_POST["reference_email_two"];
    $referencePhoneTwo = $_POST["reference_phone_two"];
    
    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $update = $mydb->updateDataUser($id,$Name, $email,$userName,$password, $dateOfBirth, $phoneNumber, $adminRole, $location, $profile_Picture, $referenceName,$referenceEmail,$referencePhone, $referenceNameTwo,$referenceEmailTwo, $referencePhoneTwo, "admin", $conobj);
    if ($update === 1) {
        echo "Data updated successfully";
        header("Location:../view/showuser.php");
    } else {
        echo "Error updating data: " . $update;
    }
}
?>