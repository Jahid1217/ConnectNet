<?php 
    include '../model/db.php';
    $myDB = new myDB(); 
    $conn = $myDB->openCon(); 

    if (isset($_GET["uname"])) { 
    $username = $_GET["uname"];
        $result = $myDB->searchUserByUsernameByCostomer($conn, $username); 
    
        if ($result && $result->num_rows > 0) { 
            foreach ($result as $row) { 
                echo "<table class='search_table'>";
                echo "<tr><th>Profile Picture</th><td>
                      <img src='../uplodefile/" . htmlspecialchars($row['picture']) . "' alt='Profile Picture' id='User_Show_Pic'></td></tr>";
                echo "<tr><th>Name</th><td>" . htmlspecialchars($row['name']) . "</td></tr>";
                echo "<tr><th>Email</th><td>" . htmlspecialchars($row['email']) . "</td></tr>";
                echo "<tr><th>Username</th><td>" . htmlspecialchars($row['username']) . "</td></tr>";
                echo "<tr><th>Phone</th><td>" . htmlspecialchars($row['phone']) . "</td></tr>";
                echo "<tr><th>DOB</th><td>" . htmlspecialchars($row['role']) . "</td></tr>";
                echo "</tr>";
    echo "</table>";
    
            }
        } else {
                }
    }
?>