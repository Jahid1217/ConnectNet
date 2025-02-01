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

    // ✅ Fetch all customers
    public function getAllCustomers() {
        $sql = "SELECT customer_Id, name, email, phone, username, inst_address FROM customer";
        return $this->conn->query($sql);
    }

    // ✅ Fetch customer by ID
    public function getCustomerByID($customerId) {
        $sql = "SELECT * FROM customer WHERE customer_Id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ✅ Delete customer by ID
    public function deleteCustomerByID($customerId) {
        $sql = "DELETE FROM customer WHERE customer_Id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $customerId);
        return $stmt->execute();
    }

    // ✅ Update customer details
    public function updateCustomer($data) {
        $sql = "UPDATE customer SET name=?, email=?, phone=?, username=?, password=?, inst_address=?, picture=? WHERE customer_Id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param(
            "sssssssi",
            $data['name'], $data['email'], $data['phone'], $data['username'],
            $data['password'], $data['inst_address'], $data['picture'], $data['customer_Id']
        );
        return $stmt->execute();
    }

    // ✅ Fetch all services
    public function getAllServices() {
        $sql = "SELECT service_id, service_name, serviceType, phone_number, service_plan, speed, charge, location FROM service";
        return $this->conn->query($sql);
    }

    // ✅ Fetch a specific service by ID
    public function getServiceById($serviceId) {
        $sql = "SELECT * FROM service WHERE service_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $serviceId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ✅ Fetch services linked to a seller
    public function getServicesBySellerId($sellerId) {
        $sql = "SELECT * FROM service WHERE seller_Id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $sellerId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ✅ Insert order
    public function insertOrder($customerId, $customerName, $serviceId, $orderDate) {
        $sql = "INSERT INTO `order` (customer_Id, customer_name, service_id, orderDate) VALUES (?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isis", $customerId, $customerName, $serviceId, $orderDate);

        if ($stmt->execute()) {
            return $this->conn->insert_id; // ✅ Return newly generated order ID
        } else {
            return false;
        }
    }

    // ✅ Fetch orders for a specific seller
    public function getOrdersByServiceId($serviceId) {
        $sql = "SELECT * FROM `order` WHERE service_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $serviceId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ✅ Fetch customer orders
    public function getCustomerOrders($customerId) {
        $sql = "SELECT * FROM `order` WHERE customer_Id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ✅ Fetch order details by order ID
    public function getOrderDetails($orderId) {
        $sql = "SELECT * FROM `order` WHERE order_Id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $orderId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ✅ Insert order details into `orderdet`
    // ✅ Insert order details into orderdet table
public function insertOrderDetails($orderId, $serviceId, $customerId, $servicePlan, $serviceType, $ordDescription, $instAddress) {
    $sql = "INSERT INTO orderdet (orderDet_Id, service_id, customer_Id, service_plan, service_type, ord_description, inst_address) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("iiissss", $orderId, $serviceId, $customerId, $servicePlan, $serviceType, $ordDescription, $instAddress);
    return $stmt->execute();
}
    


    // // ✅ Fetch order details for a specific customer
    // public function getOrderDetailsByCustomer($customerId) {
    //     $sql = "SELECT od.orderDet_Id, od.service_id, od.customer_Id, 
    //                    od.service_plan, od.service_type, od.ord_description, 
    //                    s.service_name, s.speed, s.charge 
    //             FROM orderdet od
    //             JOIN service s ON od.service_id = s.service_id
    //             WHERE od.customer_Id = ?";
    
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param("i", $customerId);
    //     $stmt->execute();
    //     return $stmt->get_result();
    // }

    // ✅ Fetch order details for a specific customer
    public function getOrderDetailsByCustomer($customerId) {
        $sql = "SELECT od.orderDet_Id, od.service_id, od.customer_Id, 
                       od.service_plan, s.serviceType AS service_type, od.ord_description, 
                       s.service_name, s.speed, s.charge, c.inst_address
                FROM orderdet od
                JOIN service s ON od.service_id = s.service_id
                JOIN customer c ON od.customer_Id = c.customer_Id
                WHERE od.customer_Id = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        return $stmt->get_result();
    }


    // ✅ Insert transaction linked to order & service
    public function insertTransaction($orderDetId, $serviceId, $paymentMethod, $cardNumber, $cardHolder, $expDate) {
        $sql = "INSERT INTO transaction (order_Id, service_id, payment_method, card_number, card_holder_name, exp_date) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($sql);

        // ✅ If payment method is COD, store NULL for card details
        if ($paymentMethod === "Cash on Delivery") {
            $cardNumber = NULL;
            $cardHolder = NULL;
            $expDate = NULL;
        }

        $stmt->bind_param("iissss", $orderDetId, $serviceId, $paymentMethod, $cardNumber, $cardHolder, $expDate);

        if ($stmt->execute()) {
            return true; // ✅ Successfully inserted
        } else {
            return false; // ❌ Insert failed
        }
    }

    // ✅ Fetch transactions for a customer
    public function getCustomerTransactions($customerId) {
        $sql = "SELECT * FROM transaction WHERE customer_Id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $customerId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // ✅ Fetch transactions for a seller
    public function getSellerTransactions($serviceId) {
        $sql = "SELECT t.* FROM transaction t 
                JOIN orderdet o ON t.order_Id = o.orderDet_Id
                WHERE o.service_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $serviceId);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
