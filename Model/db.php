<?php
class MyDB {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'connectnet';

    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function closeCon() {
        $this->conn->close();
    }

    public function login($userName, $password) {
        // Ensure the username is safe to use in the query (escaping)
        $userName = $this->conn->real_escape_string($userName);
        $password = $this->conn->real_escape_string($password);

        // Query to select user based on username and password
        $sql = "SELECT * FROM seller WHERE name = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $userName, $password); // Bind username and password
            $stmt->execute();  // Execute the query
            return $stmt->get_result();  // Return the result object
        } else {
            return false;  // Return false if the statement could not be prepared
        }
    }

    // Fetch all services from the service table
    public function getAllSellerServices() {
        $sql = "SELECT service_id, service_name, serviceType, phone_number, service_plan, speed, charge, location FROM service";
        return $this->conn->query($sql);
    }

    // Fetch services by seller ID
    public function getServicesBySellerId($sellerId) {
        $sql = "SELECT * FROM service WHERE service_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Fetch specific service details by service ID
    public function getServiceById($serviceId) {
        $sql = "SELECT * FROM service WHERE service_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $serviceId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Insert a new service into the service table
    public function insertService($serviceId, $serviceName, $serviceType, $phoneNumber, $servicePlan, $speed, $charge, $location) {
        $sql = "INSERT INTO service (service_id, service_name, serviceType, phone_number, service_plan, speed, charge, location) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issssdds", $serviceId, $serviceName, $serviceType, $phoneNumber, $servicePlan, $speed, $charge, $location);
        return $stmt->execute();
    }

    // Update a service (only service_plan, speed, charge can be updated)
    public function updateService($serviceId, $servicePlan, $speed, $charge) {
        $sql = "UPDATE service SET service_plan = ?, speed = ?, charge = ? WHERE service_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sddi", $servicePlan, $speed, $charge, $serviceId);
        return $stmt->execute();
    }

    // Delete a service by service ID
    public function deleteService($serviceId) {
        $sql = "DELETE FROM service WHERE service_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $serviceId);
        return $stmt->execute();
    }
    // Update seller information
// ✅ Update Seller & Automatically Update Service Table
public function updateSeller($sellerId, $name, $email, $businessName, $businessType, $location) {
    // Start a transaction to update both seller and service tables together
    $this->conn->begin_transaction();

    try {
        // Update seller table
        $sqlSeller = "UPDATE seller SET name = ?, email = ?, businessName = ?, businessType = ?, location = ? WHERE seller_Id = ?";
        $stmtSeller = $this->conn->prepare($sqlSeller);
        $stmtSeller->bind_param("sssssi", $name, $email, $businessName, $businessType, $location, $sellerId);
        $stmtSeller->execute();

        // Automatically update the related service table where service_id = seller_Id
        $sqlService = "UPDATE service SET service_name = ?, location = ? WHERE service_id = ?";
        $stmtService = $this->conn->prepare($sqlService);
        $stmtService->bind_param("ssi", $businessName, $location, $sellerId);
        $stmtService->execute();

        // Commit both updates if successful
        $this->conn->commit();
        return true;
    } catch (Exception $e) {
        // Rollback in case of an error
        $this->conn->rollback();
        return false;
    }
}


// ✅ Delete Seller & Automatically Delete Related Services
public function deleteSeller($sellerId) {
    // Start a transaction to delete both seller and services together
    $this->conn->begin_transaction();

    try {
        // First, delete related services
        $sqlService = "DELETE FROM service WHERE service_id = ?";
        $stmtService = $this->conn->prepare($sqlService);
        $stmtService->bind_param("i", $sellerId);
        $stmtService->execute();

        // Now, delete the seller
        $sqlSeller = "DELETE FROM seller WHERE seller_Id = ?";
        $stmtSeller = $this->conn->prepare($sqlSeller);
        $stmtSeller->bind_param("i", $sellerId);
        $stmtSeller->execute();

        // Commit both deletions if successful
        $this->conn->commit();
        return true;
    } catch (Exception $e) {
        // Rollback in case of an error
        $this->conn->rollback();
        return false;
    }
}

// ✅ Fetch Order Details for Seller's Service
public function getOrderDetailsByServiceId($sellerId) {
    $sql = "SELECT * FROM orderdet WHERE service_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $sellerId);
    $stmt->execute();
    return $stmt->get_result();
}


    // Fetch user data by ID
    public function getUserByID($tableName, $id) {
        $sql = "SELECT * FROM $tableName WHERE seller_Id = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            return "Error preparing statement: " . $this->conn->error;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Delete user from the database
    public function deleteDataUser($seller_Id, $table) {
        $sql = "DELETE FROM $table WHERE seller_Id = ?";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("i", $seller_Id);
            if ($stmt->execute()) {
                return 1; // Success
            } else {
                return "Error: " . $stmt->error; // Return error message if execution fails
            }
            $stmt->close();
        } else {
            return "Error preparing the statement: " . $this->conn->error;
        }
    }

    // Fetch seller details by seller_Id
public function getSellerDetails($sellerId) {
    $sql = "SELECT name, email, businessName, businessType, location FROM seller WHERE seller_Id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $sellerId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Fetch services based on seller_Id
public function getSellerServicesById($sellerId) {
    $sql = "SELECT service_name, serviceType, service_plan, speed, charge, location FROM service WHERE service_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $sellerId);
    $stmt->execute();
    return $stmt->get_result();
}

// Update service details in the database
public function updateServiceDetails($serviceId, $serviceName, $serviceType, $servicePlan, $speed, $charge, $location) {
    $sql = "UPDATE service SET service_name = ?, serviceType = ?, service_plan = ?, speed = ?, charge = ?, location = ? WHERE service_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("ssssssi", $serviceName, $serviceType, $servicePlan, $speed, $charge, $location, $serviceId);
    return $stmt->execute();
}


// // Function to update service details
// public function updateService($serviceId, $servicePlan, $speed, $charge) {
//     $sql = "UPDATE service SET service_plan = ?, speed = ?, charge = ? WHERE service_id = ?";
//     $stmt = $this->conn->prepare($sql);
//     $stmt->bind_param("sddi", $servicePlan, $speed, $charge, $serviceId);
//     return $stmt->execute();
// }
// Update service details
// public function updateServiceDetails($serviceId, $serviceName, $serviceType, $servicePlan, $speed, $charge, $location) {
//     $sql = "UPDATE service SET service_name = ?, serviceType = ?, service_plan = ?, speed = ?, charge = ?, location = ? WHERE service_id = ?";
//     $stmt = $this->conn->prepare($sql);
//     $stmt->bind_param("sssddsi", $serviceName, $serviceType, $servicePlan, $speed, $charge, $location, $serviceId);
//     return $stmt->execute();
// }

// Fetch service details by service_id
public function getServiceDetails($serviceId) {
    $sql = "SELECT service_id, service_name, serviceType, service_plan, speed, charge, location FROM service WHERE service_id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $serviceId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

public function getServiceDetailsByName($serviceName) {
    $sql = "SELECT * FROM service WHERE service_name = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("s", $serviceName);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}



    // Update user information
    public function updateDataUser($seller_Id, $name, $email, $phone, $gender, $business_name, $business_type, $location, $password, $table) {
        $sql = "UPDATE $table SET name = ?, email = ?, phoneNumber = ?, gender = ?, businessName = ?, businessType = ?, location = ?, password = ? WHERE seller_Id = ?";
        if ($stmt = $this->conn->prepare($sql)) {
            $stmt->bind_param("ssssssssi", $name, $email, $phone, $gender, $business_name, $business_type, $location, $password, $seller_Id);
            if ($stmt->execute()) {
                return 1; // Success
            } else {
                return "Error: " . $stmt->error; // Return error message if execution fails
            }
            $stmt->close();
        } else {
            return "Error preparing the statement: " . $this->conn->error;
        }
    }
}
?>
