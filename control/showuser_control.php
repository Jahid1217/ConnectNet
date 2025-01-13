<?php

include '../model/db.php';

echo "<h1>Admin Information</h1>";
$mydb = new myDB();
$conobj = $mydb->openCon();
$results =$mydb->showAll("admin",$conobj);
if ($results->num_rows > 0) {
    echo "<table class='show_table'>";
    echo "<thead>
            <tr class='table_head'>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Name</th>
                <th>DOB</th>
                <th>Phone Number</th>
                <th>Admin  Role</th>
                <th>Location</th>
                <th>Profile Picture</th>
                <th>Reference Name</th>
                <th>Reference Email</th>
                <th>Reference Phone</th>
                <th>Reference Name Two</th>
                <th>Reference Email Two</th>
                <th>Reference Phone Two</th>
            </tr>
        </thead>";
    echo "<tbody>";

    foreach ($results as $data) {
        echo "<tr class='table_row'>";
        echo "<td>" . $data['id'] . "</td>";
        echo "<td>" . $data['name'] . "</td>";
        echo "<td>" . $data['email'] . "</td>";
        echo "<td>" . $data['userName'] . "</td>";
        echo "<td>" . $data['DOB'] . "</td>";
        echo "<td>" . $data['phoneNumber'] . "</td>";
        echo "<td>" . $data['adminRole'] . "</td>";
        echo "<td>" . $data['location'] . "</td>";
        echo "<td><img src='../uplodefile/" . $data['picture'] . "' alt='Profile Picture' loading='lazy' style='width: 50px; height: 50px;'></td>";
        echo "<td>" . $data['referenceName'] . "</td>";
        echo "<td>" . $data['referenceEmail'] . "</td>";
        echo "<td>" . $data['referencePhone'] . "</td>";
        echo "<td>" . $data['referenceNameTwo'] . "</td>";
        echo "<td>" . $data['referenceEmailTwo'] . "</td>";
        echo "<td>" . $data['referencePhoneTwo'] . "</td>";
        echo "<td><a href='../view/edituser.php?id=" . $data["id"] . "'>Update</a></td>";
        echo "<td><a href='../view/deleteuser.php?id=" . $data["id"] . "'>Delete</a></td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "No records found.";
}

?>