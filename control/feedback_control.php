<?php
require "../database/db.php";
$hasError = 0;

$NameError = "";
$emailerror = "";
$issueTypeerror = "";
$messageerror = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_name = $_POST['user_name'];
    $name =trim($_POST['name']) ;
    $email =trim($_POST['Email']);
    $issue_type = isset($_POST["issuetype"]) ? $_POST["issuetype"] : "";
    $message = $_POST['message'];

    if (empty($name)) {
        $NameError = "Please write your name.";
        $hasError++;
    }
    if (empty($email)) {
        $emailerror = "Please write your email.";
        $hasError++;
    }
    if (empty($issue_type)) {
        $issueTypeerror = "Please select an issue type.";
        $hasError++;
    }
    if (empty($message)) {
        $messageerror = "Please write your message.";
        $hasError++;
    }

    if ($hasError === 0){
        
        $tableName = "feedback";
        $mydb = new myDB();
        $conobj = $mydb->openCon();

        // Insert feedback into database    
        $result = $mydb->insertfeedback($user_name, $name, $email, $issue_type, $message, $conobj);
    }
}
?>