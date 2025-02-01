<?php
include_once "../model/db.php";

$db = new MyDB();
$customers = $db->getAllCustomers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer List</title>
    <link rel="stylesheet" href="../css/mystyle.css"> <!-- Ensuring CSS is inside <head> -->
</head>
<body>
    <h1>Customer List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Username</th> <!-- Added Username -->
            <th>Installation Address</th> <!-- Added Installation Address -->
            <th>Actions</th>
        </tr>
        <?php while ($row = $customers->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['customer_Id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['username']; ?></td> <!-- Display Username -->
            <td><?php echo $row['inst_address']; ?></td> <!-- Display Installation Address -->
            <td>
                <a href="editcustomer.php?customer_Id=<?php echo $row['customer_Id']; ?>">Edit</a> |
                <a href="deletecustomer.php?customer_Id=<?php echo $row['customer_Id']; ?>">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
