<?php
session_start();
include "../model/db.php";

if (!isset($_SESSION["seller_Id"])) {
    header("Location: login.php");
    exit();
}

$myDB = new MyDB();
$sellerId = $_SESSION["seller_Id"];
$sellerInfo = $myDB->getSellerDetails($sellerId);

$businessTypes = ["BroadBand", "Optical", "DSL"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Information</title>
    <link rel="stylesheet" href="../css/newcss.css">
    
    <script>
        let sellerId = <?php echo json_encode($sellerId); ?>;
    </script>
    <script src="../js/seller_information_update.js" defer></script>

    <style>
        /* Adjust Table Width */
        .service-table {
            width: 60%; /* Reduce width from 80% to 60% */
            max-width: 700px; /* Set a max width */
            margin: 20px auto; /* Center table */
            padding: 20px;
            border-collapse: collapse;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        /* Adjust Input Field Width */
        .service-table td input {
            width: 90%; /* Reduce input width to 90% */
            padding: 8px; /* Reduce padding */
            font-size: 14px;
            border: 1px solid #bdc3c7;
            border-radius: 5px;
        }

        /* Adjust Table Cell Spacing */
        .service-table th,
        .service-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #bdc3c7;
            font-size: 14px;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
            cursor: pointer;
            margin: 10px;
        }

        .btn-edit {
            background-color: #2ecc71; /* Green */
        }
        .btn-edit:hover {
            background-color: #27ae60;
        }

        .btn-delete {
            background-color: #e74c3c; /* Red */
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }

        .btn-services {
            background-color: #3498db; /* Blue */
        }
        .btn-services:hover {
            background-color: #2980b9;
        }

        .btn-container {
            text-align: center;
            margin-top: 20px;
        }

        #message {
            text-align: center;
            font-weight: bold;
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($sellerInfo['name']); ?></h1>

    <div class="form-container">
        <table class="service-table">
            <tr>
                <th>Full Name</th>
                <td><input type="text" id="name" value="<?php echo htmlspecialchars($sellerInfo['name']); ?>"></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><input type="email" id="email" value="<?php echo htmlspecialchars($sellerInfo['email']); ?>"></td>
            </tr>
            <tr>
                <th>Business Name</th>
                <td><input type="text" id="businessName" value="<?php echo htmlspecialchars($sellerInfo['businessName']); ?>"></td>
            </tr>
            <tr>
                <th>Business Type</th>
                <td>
                    <select id="businessType">
                        <?php foreach ($businessTypes as $type): ?>
                            <option value="<?php echo $type; ?>" 
                                <?php echo ($sellerInfo['businessType'] == $type) ? 'selected' : ''; ?>>
                                <?php echo $type; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Location</th>
                <td><input type="text" id="location" value="<?php echo htmlspecialchars($sellerInfo['location']); ?>"></td>
            </tr>
        </table>

        <div class="btn-container">
            <button class="btn btn-edit" onclick="updateSellerInfo()">Update Information</button>
            <button class="btn btn-delete" onclick="deleteSeller()">Delete Account</button>
            <a href="specific_service_login.php" class="btn btn-services">Your Services</a>
        </div>

        <p id="message"></p>
    </div>
</body>
</html>
