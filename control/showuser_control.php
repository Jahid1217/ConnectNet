<?php
require_once "../model/db.php";

$myDB = new MyDB();
$result = $myDB->conn->query("SELECT * FROM seller");
$users = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}
?>
