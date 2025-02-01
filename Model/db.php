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
