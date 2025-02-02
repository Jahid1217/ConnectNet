<?php
include '../model/db.php';

if (isset($_GET["username"])) {
    $username = htmlspecialchars($_GET["username"]);

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->getUserByUsername("admin", $conobj, $username);

    if ($results && $results->num_rows > 0) {
        $data = $results->fetch_assoc();

        $Name = $data["name"];
        $email = $data["email"];
        $userName = $data["username"];
        $dateOfBirth = $data["DOB"];
        $phoneNumber = $data["phoneNumber"];
        $password = $data["password"];
        $location = $data["location"];
        $profile_Picture = $data["picture"];
    } else {
        echo "No Data Available";
    }

    $conobj->close();
} else {
    echo "Invalid username provided.";
}

if (isset($_POST["update"])) {
    $Name = ($_POST["name"]);
    $email = ($_POST["email"]);
    $dateOfBirth = ($_POST["dob"]);
    $phoneNumber = ($_POST["phone"]);
    $password = ($_POST["password"]);
    $location = ($_POST["address"]);
    $profilePicture = $_FILES["profile"]["name"];
    $userName = ($_POST["username"]);

    if (empty($Name) || empty($email) || empty($dateOfBirth) || empty($phoneNumber) || empty($password) || empty($location)) {
        echo "Please fill in all fields.";
        return;
    }
    if (!empty($profilePicture)) {
        $targetDir = "../uplodefile/";
        $targetFile = $targetDir . basename($profilePicture);

        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile)) {
            $profilePicture = basename($profilePicture);
        } else {
            echo "Error uploading file.";
            return;
        }
    }

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $update = $mydb->updateSettingUser($Name, $userName, $email, $password, $dateOfBirth, $phoneNumber, $location, $profilePicture, "admin", $conobj);

    if ($update === 1) {
        echo "Data updated successfully";
        header("Location: profileSetting.php?username=" . urlencode($_SESSION['user_name']));
        exit;
    } else {
        echo "Error updating data: " . $update;
    }
}
