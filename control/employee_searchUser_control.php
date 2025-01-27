<?php 
    include '../model/db.php';
    $myDB = new myDB(); 
    $conn = $myDB->openCon(); 

    if (isset($_GET["uname"])) { 
    $username = $_GET["uname"];
        $result = $myDB->searchUserByUsernameByEmployee($conn, $username); 
    
        if ($result && $result->num_rows > 0) { 
            foreach ($result as $row) { 
                echo "<table class='search_table'>";
                echo "<tr><th>Name</th><td>" . htmlspecialchars($row['name']) . "</td></tr>";
                echo "<tr><th>Email</th><td>" . htmlspecialchars($row['email']) . "</td></tr>";
                echo "<tr><th>Username</th><td>" . htmlspecialchars($row['username']) . "</td></tr>";
                echo "<tr><th>Phone</th><td>" . htmlspecialchars($row['phoneNumber']) . "</td></tr>";
                echo "<tr><th>DOB</th><td>" . htmlspecialchars($row['DOB']) . "</td></tr>";
                echo "<tr><th>Role</th><td>" . htmlspecialchars($row['employee_role']) . "</td></tr>";
                echo "<tr><th>Address</th><td>" . htmlspecialchars($row['location']) . "</td></tr>";
    echo "</table>";
    
            }
        } else {
                }
    }
?>