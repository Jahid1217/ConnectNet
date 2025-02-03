<?php

include '../database/db.php';

if (isset($_GET["username"])) {
    $username = htmlspecialchars($_GET["username"]);

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->getUserByUsername("employee", $conobj, $username);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            $userDetails = [
                'name' => $data["name"],
                'email' => $data["email"],
                'phoneNumber' => $data["phoneNumber"],
                'DOB' => $data["DOB"],
                'location' => $data["location"],
                'picture' => $data["picture"]
            ];
        }
    } else {
        echo "No Data Available";
    }

    $conobj->close();
}
 else {
    echo "User not logged in.";
}


if (isset($_POST["update"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $dob = $_POST["dob"];
    $address = $_POST["address"];
    $email_notifications = isset($_POST["email_notifications"]) ? 1 : 0;
    $sms_notifications = isset($_POST["sms_notifications"]) ? 1 : 0;

    $profilePicture = null;
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
        $targetDir = "../uploads/"; 
        $profilePicture = basename($_FILES["profile_picture"]["name"]);
        $targetFile = $targetDir . $profilePicture;

        // Move uploaded file
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            echo "File uploaded successfully.";
        } else {
            echo "Error uploading file.";
            return;
        }
    } else {
        $profilePicture = $userDetails['picture'];
    }

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    
    $update = $mydb->updateDataUser("employee", $conobj, $name, $email, $dob, $phone, $address, $profilePicture , $username);
    
    if ($update === 1) {
       header("Location: ../view/employeeDashboard.php");
    } else {
        echo "Error updating data!";
    }
    
    $mydb->conClose($conobj);
}

?>