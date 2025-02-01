<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Service</title>
    <link rel="stylesheet" href="../css/newcss.css">
    <style>
        .service-container {
            text-align: center;
            margin: 50px auto;
            max-width: 700px;
            background-color: transparent;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .service-container h1 {
            color: peru;
            font-size: 2em;
            margin-bottom: 20px;
        }
        .service-container table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: transparent;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2);
        }
        .service-container table th,
        .service-container table td {
            padding: 12px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            text-align: left;
        }
        .service-container table th {
            background-color: rgba(70, 130, 180, 0.9); /* Steel Blue */
            color: white;
        }
        .service-container .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .service-container .button-container button {
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 5px;
        }
        .service-container .button-container .edit-button {
            background-color: #4CAF50; /* Green for Edit */
            color: white;
        }
        .service-container .button-container .edit-button:hover {
            background-color: #45a049;
        }
        .service-container .button-container .delete-button {
            background-color: #dc3545; /* Red for Delete */
            color: white;
        }
        .service-container .button-container .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="service-container">
        <?php
        require_once '../model/db.php';

        $seller_Id = $_GET['seller_Id'] ?? null;

        if (!$seller_Id) {
            echo "<h1 style='color: red;'>Invalid Access</h1>";
            exit;
        }

        $db = new MyDB();
        $services = $db->getServicesBySellerId($seller_Id);
        $db->closeCon();

        if ($services->num_rows > 0) {
            echo "<h1>Your Service</h1>";

            while ($service = $services->fetch_assoc()) {
                echo "<form action='../control/specific_service_control.php' method='POST' class='service-form'>";
                echo "<table>";
                echo "<tr><th>Service ID</th><td>{$service['service_id']}</td></tr>";
                echo "<tr><th>Service Name</th><td>{$service['service_name']}</td></tr>";
                echo "<tr><th>Service Type</th><td>{$service['serviceType']}</td></tr>";
                echo "<tr><th>Phone Number</th><td>{$service['phone_number']}</td></tr>";

                // Service Plan as Dropdown
                echo "<tr><th>Service Plan</th><td>
                        <select name='service_plan'>
                            <option value='Basic' " . ($service['service_plan'] == 'Basic' ? "selected" : "") . ">Basic</option>
                            <option value='Primary' " . ($service['service_plan'] == 'Primary' ? "selected" : "") . ">Primary</option>
                            <option value='Dominant' " . ($service['service_plan'] == 'Dominant' ? "selected" : "") . ">Dominant</option>
                        </select>
                      </td></tr>";

                echo "<tr><th>Speed (Mbps)</th><td><input type='number' name='speed' value='{$service['speed']}'></td></tr>";
                echo "<tr><th>Charge (BDT)</th><td><input type='number' name='charge' value='{$service['charge']}'></td></tr>";
                echo "<tr><th>Location</th><td>{$service['location']}</td></tr>";
                echo "</table>";

                echo "<input type='hidden' name='service_id' value='{$service['service_id']}'>";

                echo "<div class='button-container'>";
                echo "<button type='submit' name='edit' class='edit-button'>Edit</button>";
                echo "<button type='submit' name='delete' class='delete-button' onclick='return confirm(\"Are you sure you want to delete this service?\");'>Delete</button>";
                echo "</div>";
                echo "</form>";
            }
        } else {
            echo "<h1 style='color: red;'>No Services Found</h1>";
        }
        ?>
    </div>
</body>
</html>
