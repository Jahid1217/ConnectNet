<?php
require '../model/db.php';

session_start();
$hasError = 0;
$NameError = "";
$emailError = "";
$passwordError = "";
$confirmPasswordError = "";
$userNameError = "";
$dateOfBirthError = "";
$phoneNumberError = "";
$adminRoleError = "";
$locationError = "";
$profilePictureError = "";
$termsError = "";
$referenceOneError = "";
$referenceTwoError = "";
if (isset($_POST["submit"])) {
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Name = trim($_REQUEST["Name"] ?? "");
    $email = trim($_REQUEST["email"] ?? "");
    $userName = trim($_REQUEST["user_name"] ?? "");
    $password = $_REQUEST["Password"] ?? "";
    $confirmPassword = $_REQUEST["confirm_Password"] ?? "";
    $dateOfBirth = $_REQUEST["date_of_birth"] ?? "";
    $phoneNumber = $_REQUEST["phone_number"] ?? "";
    $adminRole = $_REQUEST["admin_role"] ?? "";
    $location = trim($_REQUEST["location"] ?? "");
    $profile_Picture = trim($_REQUEST["profile_picture"] ??"");
    $terms = isset($_REQUEST["terms"]);
    $referenceName = trim($_REQUEST["reference_name"] ?? "");
    $referenceEmail = trim($_REQUEST["reference_email"] ?? "");
    $referencePhone = trim($_REQUEST["reference_phone"] ?? "");
    $referenceNameTwo = trim($_REQUEST["reference_name_two"] ?? "");
    $referenceEmailTwo = trim($_REQUEST["reference_email_two"] ?? "");
    $referencePhoneTwo = trim($_REQUEST["reference_phone_two"] ?? "");

    $Name = $_REQUEST["Name"];
    if (empty($Name) || !preg_match("/^[a-zA-Z-' ]*$/", $Name)) {
        $NameError = "Please enter a valid name.";
        $hasError++;
    }    

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) || !preg_match("/@gmail\.com$/", $email)) {
        $emailError = "Please enter a valid Gmail address.";
        $hasError++;
    }
    

    $userName = $_REQUEST["user_name"]; 
    if (empty($userName)) {
        $userNameError = "Please enter a valid username.";
        $hasError++;
    }
    if (empty($password)) {
        $passwordError = "Password cannot be empty.";
        $hasError++;
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%]).{8,}$/", $password)) {
        $passwordError = "Password must be at least 8 characters with one uppercase, one lowercase, and one special character.";
        $hasError++;
    }
    
    if ($confirmPassword) {
        $confirmPasswordError = "Confirm password must match the password.";
        $hasError++;
    }
    

    $dateOfBirth = $_REQUEST["date_of_birth"];
    if (empty($dateOfBirth)) {
        $dateOfBirthError = "Please enter the date of birth.";
        $hasError++;
    }

    $phoneNumber = $_REQUEST["phone_number"];
    if (empty($phoneNumber) || !preg_match('/^\d{11}$/', $phoneNumber)) {
        $phoneNumberError = "Please enter a valid 11-digit phone number.";
        $hasError++;
    }
    
    

    $adminRole = $_REQUEST["admin_role"];
    if (empty($adminRole)) {
        $adminRoleError = "Please select an admin role.";
        $hasError++;
    }

    $profile_Picture = $_FILES["profile_picture"]["name"];
    move_uploaded_file($_FILES["profile_picture"]["tmp_name"],
    "../uplodefile/".$_FILES["profile_picture"]["name"]
    );
    
    // if (isset($_FILES["profile_picture"]) && !empty($_FILES["profile_picture"]["name"])) {
    //     $profile_Picture = $_FILES["profile_picture"]["name"];
    //     $uploadPath = "../uplodefile/" . basename($profile_Picture);
    
    //     if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $uploadPath)) {
    //         echo "File uploaded successfully!";
    //     } else {
    //         echo "File upload failed!";
    //     }
    // } else {
    //     echo "No file uploaded!";
    // }
    
    
    $location = $_REQUEST["location"];
    if (empty($location)) {
        $locationError = "Please enter a location.";
        $hasError++;
    }


    if (!isset($_REQUEST["terms"])) {
        $termsError = "You must agree to the terms and conditions.";
        $hasError++;
    }
    

    $referenceName = $_REQUEST["reference_name"];
    $referenceEmail = $_REQUEST["reference_email"];
    $referencePhone = $_REQUEST["reference_phone"];
    if (empty($referenceName) || empty($referenceEmail) || empty($referencePhone)) {
        $referenceOneError = "Please fill in all reference one details.";
        $hasError++;
    }

    if ($hasError === 0) {
        $tableName = "admin"; 
        $myDB = new myDB();
        $connectionObject = $myDB->openCon();
    
        if ($connectionObject) {
            $result = $myDB->insertData(
                $Name, $email, $userName, $password, $dateOfBirth, $phoneNumber, $adminRole, $location, $profile_Picture,
                $referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo,
                $connectionObject, $tableName
            );
            
            $myDB->closeCon($connectionObject);
    
            if ($result === 1) {
                header("Location: ../view/login.php");
                exit;
            } else {
                echo "Error inserting data into the database.";
            }
        } else {
            echo "Database connection failed.";
        }
    }
    
    // if ($hasError === 0) {
    //     echo $Name;
    //     // $data = [
    //     //     "first_Name" => $firstName,
    //     //     "last_Name" => $lastName,
    //     //     "email" => $email,
    //     //     "user_name" => $userName,
    //     //     "password" => $password,
    //     //     "date_of_birth" => $dateOfBirth,
    //     //     "phone_number" => $phoneNumber,
    //     //     "admin_role" => $adminRole,
    //     //     "location" => $location,
    //     //     "profile_picture" => $fileName,
    //     //     "reference_one" => [
    //     //         "name" => $referenceName,
    //     //         "email" => $referenceEmail,
    //     //         "phone" => $referencePhone,
    //     //     ],
    //     //     "reference_two" => [
    //     //         "name" => $referenceNameTwo,
    //     //         "email" => $referenceEmailTwo,
    //     //         "phone" => $referencePhoneTwo,
    //     //     ]
    //     // ];

    //     // $json = json_encode($data); // Encode to JSON

    //     // if (file_put_contents("../files/userdata.json", $json)) {
    //     //     echo "Data saved successfully.";
            
    //     // } else {
    //     //     echo "Failed to save data.";}
    //     // $_SESSION["user_name"] =$_REQUEST["user_name"];
    //     // $_SESSION["Password"] =$_REQUEST["Password"];
    //     $tableName = "admin"; // Define the table name
    //     $myDB = new myDB();
    //     $connectionObject = $myDB->openCon();

    //     $result = $myDB->insertData(
    //         $Name, $email, $userName, $password, $dateOfBirth, $phoneNumber,$adminRole, $location, $profile_Picture, $referenceName, $referenceEmail, $referencePhone,$referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo, $connectionObject,$tableName
    //     );
    //     $myDB->closeCon($connectionObject);

    //     if ($result === 1) {
    //         // $_SESSION["user_name"] = $userName;
    //         // $_SESSION["Password"] = $password;
    //         header("Location: ../view/login.php");
    //         exit;
    //     } else {
    //         echo "Error inserting data into the database.";
    //     }
    //     }
    //     else{
    //         return 0;
    //     }
    }

}

?>
