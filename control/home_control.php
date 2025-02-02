<?php
include '../model/db.php';

$mydb = new myDB();
$conobj = $mydb->openCon();


$results = $mydb->numberOfAdmin($conobj);
$numAdmin = ($results && $row = $results->fetch_assoc()) ? $row['count'] : 0;

$resultscus = $mydb->numberOfCustomer($conobj);
$numCustomer = ($resultscus && $row = $resultscus->fetch_assoc()) ? $row['count'] : 0;


$resultssell = $mydb->numberOfseller($conobj);
$numSeller = ($resultssell && $row = $resultssell->fetch_assoc()) ? $row['count'] : 0;


$resultemp = $mydb->numberOfEmployee($conobj);
$numemp = ($resultemp && $row = $resultemp->fetch_assoc()) ? $row['count'] : 0;

?>
