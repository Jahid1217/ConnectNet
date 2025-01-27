<?php

include '../model/db.php';

// Validate and sanitize the input
if (isset($_GET["username"])) {
    $username = ($_GET["username"]); 

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->getUserByUsername("admin", $conobj, $username);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
        
            $Name = $data["name"];
            $email = $data["email"];
            $userName = $data["username"];
            $dateOfBirth = $data["DOB"];
            $phoneNumber = $data["phoneNumber"];
            $password = $data["password"];
            $adminRole = $data["adminRole"];
            $location = $data["location"];
            $profile_Picture = "<img src='../uplodefile/" . htmlspecialchars($data['picture']) . "' alt='Profile Picture' id='User_Show_Pic'>";
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
?>