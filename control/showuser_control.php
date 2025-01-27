<?php

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
                    </tr>
                </thead>";
            echo "<tbody>";
        
            foreach ($results as $data) {
                echo "<tr class='table_row'>";
                echo "<td>" . $data['id'] . "</td>";
                echo "<td>" . $data['name'] . "</td>";
                echo "<td>" . $data['email'] . "</td>";
                echo "<td>" . $data['username'] . "</td>";
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