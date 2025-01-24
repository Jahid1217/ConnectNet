<?php

include '../database/db.php';

echo "<h1>Employee Information</h1>";
$mydb = new myDB();
$conobj = $mydb->openCon();
$results =$mydb->showAll("employee",$conobj);
if ($results->num_rows > 0) {
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Name</th>
                <th>DOB</th>
                <th>Phone Number</th>
                <th>Role</th>
                <th>Location</th>
                <th>department</th>
                <th>employeeType</th>
            </tr>
        </thead>";
    echo "<tbody>";

    foreach ($results as $data) {
        echo "<tr>";
        echo "<td>" . $data['employee_Id'] . "</td>";
        echo "<td>" . $data['name'] . "</td>";
        echo "<td>" . $data['email'] . "</td>";
        echo "<td>" . $data['userName'] . "</td>";
        echo "<td>" . $data['DOB'] . "</td>";
        echo "<td>" . $data['phoneNumber'] . "</td>";
        echo "<td>" . $data['Role'] . "</td>";
        echo "<td>" . $data['location'] . "</td>";
        echo "<td>" . $data['department'] . "</td>";
        echo "<td>" . $data['employeeType'] . "</td>";
        echo "<td><a href='../view/update_user.php?id=" . $data["employee_Id"] . "'>Update</a></td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
} else {
    echo "No records found.";
}


?>