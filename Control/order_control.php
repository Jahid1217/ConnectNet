<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST['selected_service'])) {
        echo "<h1 class='error-message'>You must select a service to proceed.</h1>";
        exit();
    }

    $selected_service = $_POST['selected_service'];
    echo "<h1 class='success-message'>Service ID $selected_service selected. Proceeding...</h1>";
    exit();
}
?>
<head>
    <link rel='stylesheet' href='../css/mystyle.css'> <!-- External CSS -->
</head>
