<?php 
    include '../model/db.php';
    $myDB = new myDB(); 
    $conn = $myDB->openCon(); 

    if (isset($_GET["uname"])) { 
    $username = $_GET["uname"];
        $result = $myDB->searchUserByUsername($conn, $username); 
    
        if ($result && $result->num_rows > 0) { 
            foreach ($result as $row) { 
                echo "<table class='search_table'>";
                echo "<tr><th>Name</th><td>" . htmlspecialchars($row['name']) . "</td></tr>";
                echo "<tr><th>Email</th><td>" . htmlspecialchars($row['email']) . "</td></tr>";
                echo "<tr><th>DOB</th><td>" . htmlspecialchars($row['DOB']) . "</td></tr>";
                echo "<tr><th>Address</th><td>" . htmlspecialchars($row['location']) . "</td></tr>";
                echo "<tr><th>Phone</th><td>" . htmlspecialchars($row['phoneNumber']) . "</td></tr>";
                echo "<tr><th>Username</th><td>" . htmlspecialchars($row['username']) . "</td></tr>";
                echo "<tr><th>Role</th><td>" . htmlspecialchars($row['adminRole']) . "</td></tr>";
                echo "<tr><th>Location</th><td>" . htmlspecialchars($row['location']) . "</td></tr>";
                echo "<tr><th>Profile Picture</th><td>
                      <img src='../uplodefile/" . htmlspecialchars($row['picture'], ENT_QUOTES, 'UTF-8') . "' alt='Profile Picture' id='User_Show_Pic'></td></tr>";
                echo "<tr><th>Reference Name</th><td>" . htmlspecialchars($row['referenceName']) . "</td></tr>";
                echo "<tr><th>Reference Email</th><td>" . htmlspecialchars($row['referenceEmail']) . "</td></tr>";
                echo "<tr><th>Reference Phone</th><td>" . htmlspecialchars($row['referencePhone']) . "</td></tr>";
                echo "<tr><th>Reference Name Two</th><td>" . htmlspecialchars($row['referenceNameTwo']) . "</td></tr>";
                echo "<tr><th>Reference Email Two</th><td>" . htmlspecialchars($row['referenceEmailTwo']) . "</td></tr>";
                echo "<tr><th>Reference Phone Two</th><td>" . htmlspecialchars($row['referencePhoneTwo']) . "</td></tr>";
                echo "</tr>";
    echo "</table>";
    
            }
        } else {
                }
    }
?>