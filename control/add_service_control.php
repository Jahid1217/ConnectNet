<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Confirmation</title>
    <link rel="stylesheet" href="../css/mycss.css">
    <style>
        .confirmation-container {
            text-align: center;
            margin: 50px auto;
            max-width: 600px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 16px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .confirmation-container h1 {
            color: green;
            font-size: 2em;
            margin-bottom: 20px;
        }
        .confirmation-container p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .confirmation-container button {
            margin: 10px 5px;
            padding: 10px 20px;
            font-size: 1em;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .confirmation-container button.view-services {
            background-color: #4CAF50;
            color: white;
        }
        .confirmation-container button.view-services:hover {
            background-color: #45a049;
        }
        .confirmation-container button.view-specific-service {
            background-color: #008CBA;
            color: white;
        }
        .confirmation-container button.view-specific-service:hover {
            background-color: #007BB5;
        }
    </style>
</head>
<body>
    <div class="confirmation-container">
        <?php
        require_once '../model/db.php';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $serviceId = $_POST['service_id'];
            $serviceName = $_POST['service_name'];
            $serviceType = $_POST['serviceType'];
            $phoneNumber = $_POST['phone_number'];
            $servicePlan = $_POST['service_plan'];
            $speed = $_POST['speed'];
            $charge = $_POST['charge'];
            $location = $_POST['location'];

            if (empty($speed) || empty($charge)) {
                echo "<h1 style='color: red;'>Empty Field</h1>";
                echo "<p class='error-message'>Please enter speed and charge.</p>";
                echo "<a href='../view/add_service.php?seller_Id={$serviceId}'><button class='view-specific-service'>Go Back</button></a>";
                exit;
            }
            $db = new MyDB();

            if ($db->insertService($serviceId, $serviceName, $serviceType, $phoneNumber, $servicePlan, $speed, $charge, $location)) {
                echo "<h1>Service Added Successfully!</h1>";
                echo "<p>Your service has been successfully added to the database.</p>";
                echo "<div>";
                echo "<a href='../view/service.php'><button class='view-services'>View All Services</button></a>";
                echo "<a href='../view/specific_service.php?seller_Id={$serviceId}'><button class='view-specific-service'>View Your Service</button></a>";
                echo "</div>";
            } else {
                echo "<h1 style='color: red;'>Failed to Add Service</h1>";
                echo "<p>Something went wrong while adding your service. Please try again later.</p>";
            }

            $db->closeCon();
        }
        ?>
    </div>
</body>
</html>
