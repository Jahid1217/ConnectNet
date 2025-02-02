
<?php

echo "<h1>Seller Information</h1>";

        $mydb = new myDB();
        $conobj = $mydb->openCon();
        $results =$mydb->SellerShowAll($conobj);
        if ($results->num_rows > 0) {
            echo "<table class='show_table'>";
            echo "<thead>
                    <tr class='table_head'>
                         <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>User Name</th>
                        <th>Business Name </th>
                        <th>Status</th>
                    </tr>
                </thead>";
            echo "<tbody>";
        
            foreach ($results as $data) {
                echo "<tr class='table_row'>";
                echo "<td>" . $data['seller_Id'] . "</td>";
                echo "<td>" . $data['name'] . "</td>";
                echo "<td>" . $data['email'] . "</td>";
                echo "<td>" . $data['username'] . "</td>";
                echo "<td>" . $data['businessName'] . "</td>";
                echo "<td>" . $data['status'] . "</td>";
                echo "<td><a href='../view/seller_approve.php?id=" . $data["seller_Id"] . "'>Approve</a></td>";
                echo "<td><a href='../control/seller_delete_control.php?id=" . $data["seller_Id"] . "'>Delete</a></td>";
                echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No records found.";
        }

?>