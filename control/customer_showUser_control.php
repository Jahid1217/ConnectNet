<?php

echo "<h1>Customer Information</h1>";

        $mydb = new myDB();
        $conobj = $mydb->openCon();
        $results =$mydb->CustomerShowAll($conobj);
        if ($results->num_rows > 0) {
            echo "<table class='show_table'>";
            echo "<thead>
                    <tr class='table_head'>
                         <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Name</th>
                        <th>Role</th>
                    </tr>
                </thead>";
            echo "<tbody>";
        
            foreach ($results as $data) {
                echo "<tr class='table_row'>";
                echo "<td>" . $data['customer_Id'] . "</td>";
                echo "<td>" . $data['name'] . "</td>";
                echo "<td>" . $data['email'] . "</td>";
                echo "<td>" . $data['username'] . "</td>";
                echo "<td>" . $data['role'] . "</td>";
                echo "<td><a href='../control/customer_delete_control.php?id=" . $data["customer_Id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No records found.";
        }

?>