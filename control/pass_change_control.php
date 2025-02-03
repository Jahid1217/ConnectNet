<?php 

include '../database/db.php';
$hasError = 0;
$passwordError = "";
$confirmPasswordError = "";

if (isset($_GET["username"])){
    $username = htmlspecialchars($_GET["username"]);
    //$current_password = $_POST["current_password"];

    $mydb = new myDB();
    $conobj = $mydb->openCon();
    $results = $mydb->getUserByUsername("employee", $conobj, $username);

    if ($results && $results->num_rows > 0) {
        while ($data = $results->fetch_assoc()) {
            $userDetails = [
                'password' => $data["password"]
            ];
        }
        echo "Data Available";
    } else {
        echo "No Data Available";
    }
    $conobj->close();
}
else {
    echo "User not logged in.";
}




if (isset($_POST["update"])) {

    $current_password= $_POST["current_password"];
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($current_password)) {
        $passwordError = "Please enter your current password.";
        $hasError++;
    } elseif ($current_password !== $userDetails['password']) {
        $passwordError = "Incorrect password.";
        $hasError++;
    }
    if (empty($confirm_password)) {
        $confirmPasswordError = "Please confirm your password.";
        $hasError++;
    } elseif ($new_password !== $confirm_password) {
        $confirmPasswordError = "Passwords do not match.";
        $hasError++;
    }

    if ($hasError === 0) {
        $mydb = new myDB();
    $conobj = $mydb->openCon();
        $update = $mydb->updatePassword("employee", $conobj, $new_password, $username);
        if ($update === 1) {
            header("Location: employee_setting.php?username=$username");
        } else {
            echo "Failed to update password.";
        }
        $mydb->conClose($conobj);
    }
    else{
        echo "Error updating password!";
    }
    
}
?>