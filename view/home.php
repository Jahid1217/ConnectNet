<?php
session_start();
if(!isset($_SESSION["user_name"])){
    header("location:../view/admin.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hi</h1>

<?php
// Echo session variables that were set on previous page
    echo "User Name " . $_SESSION["user_name"] . ".<br>";
    //echo "Password " . $_SESSION["Password"] . "<br>";
?>
<a href="showuser.php">Show Database List</a><br><br>
<a href="../control/session_Logout.php">Logout</a>
</body>
</html>