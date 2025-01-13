<?php
echo "<h1>Admin Information</h1>";

// Admin Information
if (isset($_POST["first_Name"])) {
    $first_Name = $_POST["first_Name"];
} else {
    $first_Name = '';
}

if (isset($_POST["last_Name"])) {
    $last_Name = $_POST["last_Name"];
} else {
    $last_Name = '';
}

if (isset($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $email = '';
}

if (isset($_POST["user_name"])) {
    $user_name = $_POST["user_name"];
} else {
    $user_name = '';
}

if (isset($_POST["dath_of_birth"])) {
    $date_of_birth = $_POST["dath_of_birth"];
} else {
    $date_of_birth = '';
}

if (isset($_POST["phone_number"])) {
    $phone_number = $_POST["phone_number"];
} else {
    $phone_number = '';
}

if (isset($_POST["admin_role"])) {
    $admin_role = $_POST["admin_role"];
} else {
    $admin_role = '';
}

if (isset($_POST["location"])) {
    $location = $_POST["location"];
} else {
    $location = '';
}

if (isset($_POST["profile_Picture"])) {
    $profile_picture = $_POST["profile_Picture"];
} else {
    $profile_picture = '';
}

// Reference Information One
if (isset($_POST["reference_name"])) {
    $reference_name = $_POST["reference_name"];
} else {
    $reference_name = '';
}

if (isset($_POST["reference_email"])) {
    $reference_email = $_POST["reference_email"];
} else {
    $reference_email = '';
}

if (isset($_POST["reference_phone"])) {
    $reference_phone = $_POST["reference_phone"];
} else {
    $reference_phone = '';
}

// Reference Information Two
if (isset($_POST["reference_name_two"])) {
    $reference_name_two = $_POST["reference_name_two"];
} else {
    $reference_name_two = '';
}

if (isset($_POST["reference_email_two"])) {
    $reference_email_two = $_POST["reference_email_two"];
} else {
    $reference_email_two = '';
}

if (isset($_POST["reference_phone_two"])) {
    $reference_phone_two = $_POST["reference_phone_two"];
} else {
    $reference_phone_two = '';
}
// Display the form data
if (!empty($first_Name) && !empty($last_Name)) {
    echo "Name: " . $first_Name . " " . $last_Name . "<br>";
} else {
    echo "Name: Please fill in the first and last name.<br>";
}

if (!empty($email)) {
    echo "Email: " . $email . "<br>";
} else {
    echo "Email: Please fill in the email.<br>";
}

if (!empty($user_name)) {
    echo "User Name: " . $user_name . "<br>";
} else {
    echo "User Name: Please fill in the user name.<br>";
}

if (!empty($date_of_birth)) {
    echo "Date of Birth: " . $date_of_birth . "<br>";
} else {
    echo "Date of Birth: Please fill in the date of birth.<br>";
}

if (!empty($phone_number)) {
    echo "Phone Number: " . $phone_number . "<br>";
} else {
    echo "Phone Number: Please fill in the phone number.<br>";
}

if (!empty($admin_role)) {
    echo "Admin Role: " . $admin_role . "<br>";
} else {
    echo "Admin Role: Please fill in the admin role.<br>";
}

if (!empty($location)) {
    echo "Location: " . $location . "<br>";
} else {
    echo "Location: Please fill in the location.<br>";
}

if (!empty($profile_picture)) {
    echo "Picture: " . $profile_picture . "<br><br>";
} else {
    echo "Picture: Please upload a profile picture.<br><br>";
}

// Reference Information One
echo "<h4>Reference Information One</h4>";

if (!empty($reference_name)) {
    echo "Reference Name: " . $reference_name . "<br>";
} else {
    echo "Reference Name: Please fill in the reference name.<br>";
}

if (!empty($reference_email)) {
    echo "Email Address: " . $reference_email . "<br>";
} else {
    echo "Email Address: Please fill in the reference email.<br>";
}

if (!empty($reference_phone)) {
    echo "Phone Number: " . $reference_phone . "<br><br>";
} else {
    echo "Phone Number: Please fill in the reference phone number.<br><br>";
}

// Reference Information Two
echo "<h4>Reference Information Two</h4>";

if (!empty($reference_name_two)) {
    echo "Reference Name: " . $reference_name_two . "<br>";
} else {
    echo "Reference Name: Please fill in the second reference name.<br>";
}

if (!empty($reference_email_two)) {
    echo "Email Address: " . $reference_email_two . "<br>";
} else {
    echo "Email Address: Please fill in the second reference email.<br>";
}

if (!empty($reference_phone_two)) {
    echo "Phone Number: " . $reference_phone_two . "<br>";
} else {
    echo "Phone Number: Please fill in the second reference phone number.<br>";
}

// Check if the file exists, create if not
$fileName = "datafile/newfile.txt";
if (!file_exists($fileName)) {
    die("File does not exist or is not accessible.");
}

$myfile = fopen($fileName, "a") or die("Unable to open file!");

// Write Admin Information Section
$txt = "Admin Information\n";
fwrite($myfile, $txt);
fwrite($myfile, "Name: " . $first_Name . " " . $last_Name . "\n");
fwrite($myfile, "Email: " . $email . "\n");
fwrite($myfile, "User Name: " . $user_name . "\n");
fwrite($myfile, "Date of Birth: " . $date_of_birth . "\n");
fwrite($myfile, "Phone Number: " . $phone_number . "\n");
fwrite($myfile, "Admin Role: " . $admin_role . "\n");
fwrite($myfile, "Location: " . $location . "\n");
fwrite($myfile, "Picture: " . $profile_picture . "\n");

$txt = "----------------------------- Reference One -----------------------------\n\n";
fwrite($myfile, $txt);
fwrite($myfile, "Reference Name One: " . $reference_name . "\n");
fwrite($myfile, "Email Address One: " . $reference_email . "\n");
fwrite($myfile, "Phone Number One: " . $reference_phone . "\n");

$txt = "----------------------------- Reference Two -----------------------------\n\n";
fwrite($myfile, $txt);
fwrite($myfile, "Reference Name Two: " . $reference_name_two . "\n");
fwrite($myfile, "Email Address Two: " . $reference_email_two . "\n");
fwrite($myfile, "Phone Number Two: " . $reference_phone_two . "\n");

$txt = "---------------------------------------------------------------\n";
fwrite($myfile, $txt);

// Close the file
fclose($myfile);
echo"<br><br>";
$myfile = fopen("datafile/newfile.txt","r")or die("Unable to open file!");
echo fread($myfile,filesize("datafile/newfile.txt"));
fclose($myfile);
?>
