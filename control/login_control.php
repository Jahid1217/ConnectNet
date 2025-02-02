<?php

include "../model/db.php";

session_start();
$hasError = 0;
$userNameError = "";
$passwordError = "";
$termsError = "";
$roleError = "";

// Validate and sanitize the input
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $userName = trim($_REQUEST["username"] ?? "");
    $password = $_REQUEST["password"] ?? "";
    $role = $_REQUEST["role"] ?? "";

    if (empty($userName)) {
        $userNameError = "Please enter a username.";
        $hasError++;
    }

    if (empty($password)) {
        $passwordError = "Please enter a password.";
        $hasError++;
    }

    if (empty($_REQUEST["terms"])) {
        $termsError = "You must agree to the terms and conditions.";
    }

    if ($hasError == 0) {
        $myDB = new MyDB();
        $connectionObject = $myDB->conn;

        if ($role === "seller") {
            $sql = "SELECT * FROM seller WHERE username = ? AND password = ?";
            $stmt = $connectionObject->prepare($sql);
            $stmt->bind_param("ss", $userName, $password);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION["username"] = $userName;
                $_SESSION["seller_Id"] = $row['seller_Id'];

                // Redirect to seller information page
                echo "<script>
                        alert('Login Successful');
                        window.location.href = '../view/seller_information.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Incorrect username or password');
                        window.location.href = '../view/login.php';
                      </script>";
            }

            $stmt->close();
        }

        $myDB->closeCon();
    }
}
?>
