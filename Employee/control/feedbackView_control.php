
<?php

echo "<h1>Feedback Information</h1>";
include '../database/db.php';
        $mydb = new myDB();
        $conobj = $mydb->openCon();
        $results =$mydb->FeedbackShowAll($conobj);
        if ($results->num_rows > 0) {
            echo "<table class='show_table'>";
            echo "<thead>
                    <tr class='table_head'>
                         <th>Feedback ID</th>
                        <th>User Name</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Issue Type</th>
                        <th>Message</th>
                        <th>Feedback Date</th>
                        <th>Current Status</th>
                        <th>Update Status</th>

                    </tr>
                </thead>";
            echo "<tbody>";
        
            foreach ($results as $data) {
                echo "<tr class='table_row'>";
                echo "<td>" . $data['feedback_Id'] . "</td>";
                echo "<td>" . $data['user_name'] . "</td>";
                echo "<td>" . $data['f_name'] . "</td>";
                echo "<td>" . $data['f_email'] . "</td>";
                echo "<td>" . $data['issue_type'] . "</td>";
                echo "<td>" . $data['message'] . "</td>";
                echo "<td>" . $data['feedback_date'] . "</td>";
                echo "<td>" . $data['Status'] . "</td>";
                echo "<td>
                <form action='feedbackStatusUpdate_control.php' method='post'>
                <select name='status'>
                    <option value='Pending'" . ($data['Status'] === 'Pending' ? " selected" : "") . ">Pending</option>
                    <option value='Resolved'" . ($data['Status'] === 'Resolved' ? " selected" : "") . ">Resolved</option>
                    <option value='Closed'" . ($data['Status'] === 'Closed' ? " selected" : "") . ">Closed</option>
                </select>
                <input type='hidden' name='feedbackId' value='" . $data['feedback_Id'] . "'>
                <button type='submit'>Update</button>
            </form>
          </td>";

              echo "</tr>";
            }
            
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "No records found.";
        }

?>