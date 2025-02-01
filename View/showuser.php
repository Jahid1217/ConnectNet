<?php
include_once "../model/db.php";  // Include the database connection file
include "../control/showuser_control.php";  // Correct the path to the control folder
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Users</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; text-align: left; }
        tr:hover { background-color: #f1f1f1; }
    </style>
</head>
<body>
    <h1>User List</h1>
    <?php if ($users): ?>
        <table>
            <tr>
                <?php foreach (array_keys($users[0]) as $header): ?>
                    <th><?= htmlspecialchars($header) ?></th>
                <?php endforeach; ?>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <?php foreach ($user as $value): ?>
                        <td><?= htmlspecialchars($value) ?></td>
                    <?php endforeach; ?>
                    <td>
                        <a href="edituser.php?seller_Id=<?= $user['seller_Id'] ?>">Edit</a> | 
                        <a href="deleteuser.php?seller_Id=<?= $user['seller_Id'] ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>
</body>
</html>
<head>
    <link rel="stylesheet" href="../css/mycss.css">
</head>