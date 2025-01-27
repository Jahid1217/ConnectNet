<?php 
    include '../model/db.php';
    $myDB = new myDB(); 
    $conn = $myDB->openCon(); 

    if (isset($_GET["uname"])) { 
    $username = $_GET["uname"];
        $result = $myDB->searchUserByUsernameBySeller($conn, $username); 
    
        if ($result && $result->num_rows > 0) { 
            foreach ($result as $row) { 
                echo "<table class='search_table'>";
                echo "<tr><th>Name</th><td>" . htmlspecialchars($row['name']) . "</td></tr>";
                echo "<tr><th>Email</th><td>" . htmlspecialchars($row['email']) . "</td></tr>";
                echo "<tr><th>Username</th><td>" . htmlspecialchars($row['username']) . "</td></tr>";
                echo "<tr><th>Phone</th><td>" . htmlspecialchars($row['phoneNumber']) . "</td></tr>";
                echo "<tr><th>Gender</th><td>" . htmlspecialchars($row['gender']) . "</td></tr>";
                echo "<tr><th>business Name</th><td>" . htmlspecialchars($row['businessName']) . "</td></tr>";
                echo "<tr><th>Address</th><td>" . htmlspecialchars($row['location']) . "</td></tr>";
                echo "</tr>";
    echo "</table>";
    
            }
        } else {
                }
    }
?>