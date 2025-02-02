<?php
class myDB {
    // Function to open a connection to the database
    public function openCon() {
        $DBHost = "localhost"; 
        $DBUser = "root";      
        $DBPassword = "";      
        $DBName = "connectnet";   
        // Create a connection object
        $connectionObject = new mysqli($DBHost, $DBUser, $DBPassword, $DBName);
        return $connectionObject;
    }

    public function insertData( $Name, $email,$userName, $password, $dateOfBirth, $phoneNumber, $adminRole, $location, $profile_Picture, $referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo, $connectionObject) 
    {
        // Corrected SQL query with 12 placeholders
        $sql = "INSERT INTO admin (name, email,username,password, DOB, phoneNumber, adminRole, location, picture, referenceName, referenceEmail, referencePhone, referenceNameTwo, referenceEmailTwo, referencePhoneTwo) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        // Prepare the statement
        $stmt = $connectionObject->prepare($sql);
        
        // Bind parameters to the prepared statement
        $stmt->bind_param(
            "sssssssssssssss", $Name, $email, $userName, $password, $dateOfBirth, $phoneNumber, $adminRole, $location, $profile_Picture,
            $referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo
        );
    
        // Execute the statement and handle result
        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $stmt->close();
            return "Error executing statement: " . $stmt->error;
        }
    }
    
    // Function to show all records from the database
    function showAll($tableName,$connectionObject){
        $sql = "SELECT id,name, email,username, DOB, phoneNumber, adminRole, location, picture, referenceName, referenceEmail, referencePhone, referenceNameTwo, referenceEmailTwo, referencePhoneTwo FROM $tableName";
        $resutlts = $connectionObject->query($sql);
        return $resutlts;
    }
    function CustomerShowAll($connectionObject){
        $sql = "SELECT * FROM customer";
        $resutlts = $connectionObject->query($sql);
        return $resutlts;
    }

    function EmployeeShowAll($connectionObject){
        $sql = "SELECT * FROM employee";
        $resutlts = $connectionObject->query($sql);
        return $resutlts;
    }
    function SellerShowAll($connectionObject){
        $sql = "SELECT * FROM seller";
        $resutlts = $connectionObject->query($sql);
        return $resutlts;
    }
    // Function to get user by id
    function getUserByID($tableName, $connectionObject, $id) {
        $sql = "SELECT * FROM $tableName WHERE id = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    // Function to get user by username
    function getUserByUsername($tableName, $connectionObject, $username) {
        $sql = "SELECT * FROM $tableName WHERE username = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    function searchUserByUsernameByCostomer($connectionObject, $username) {
        $sql = "SELECT * FROM customer WHERE username = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    function searchUserByUsernameByEmployee($connectionObject, $username) {
        $sql = "SELECT * FROM employee WHERE email = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    function searchUserByIdByEmployee($connectionObject, $id) {
        $sql = "SELECT * FROM employee WHERE employee_Id = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    function searchUserByIdBySeller($connectionObject, $id) {
        $sql = "SELECT * FROM seller WHERE seller_Id = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    function searchUserByUsernameBySeller($connectionObject, $username) {
        $sql = "SELECT * FROM seller WHERE email = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }

    // Function to delete a record from the database
    function deleteData($id, $tableName, $connectionObject){
        $sql = "DELETE FROM $tableName WHERE id =?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $stmt->close();
            return "Error executing statement: ". $stmt->error;
        }
    }
    // Function to update a record in the database
    
    function customerDeleteData($id, $connectionObject){
        $sql = "DELETE FROM customer WHERE customer_Id =?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $stmt->close();
            return "Error executing statement: ". $stmt->error;
        }
    }
    function employeeDeleteData($id, $connectionObject){
        $sql = "DELETE FROM employee WHERE employee_Id =?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $stmt->close();
            return "Error executing statement: ". $stmt->error;
        }
    }
    function sellerDeleteData($id, $connectionObject){
        $sql = "DELETE FROM seller WHERE seller_Id =?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $stmt->close();
            return "Error executing statement: ". $stmt->error;
        }
    }

    // Function to update a record in the database
    function updateDataUser($id, $Name, $email, $userName, $password, $dateOfBirth, $phoneNumber, $location,$referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo, $tableName, $connectionObject) {

        $sql = "UPDATE $tableName SET 
                    name = ?, 
                    email = ?, 
                    username = ?, 
                    password = ?, 
                    DOB = ?, 
                    phoneNumber = ?,
                    location = ?, 
                    referenceName = ?, 
                    referenceEmail = ?, 
                    referencePhone = ?, 
                    referenceNameTwo = ?, 
                    referenceEmailTwo = ?, 
                    referencePhoneTwo = ? 
                WHERE id = ?";
        
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param(
            "sssssssssssssi", 
            $Name, $email, $userName, $password, $dateOfBirth, $phoneNumber, $location,$referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo, $id
        );
        if ($stmt->execute()) {
            $stmt->close();
            return 1; 
        } else {
            $error = "Error executing statement: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }
    function searchUserByUsername($connectionObject, $userName) {
        $sql = "SELECT * FROM admin WHERE name = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("s", $userName);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    function updateSettingUser($Name, $userName, $email, $password, $dateOfBirth, $phoneNumber, $location, $profile_Picture, $tableName, $connectionObject) {
        $sql = "UPDATE admin SET 
                    name = ?, 
                    email = ?, 
                    password = ?, 
                    DOB = ?, 
                    phoneNumber = ?, 
                    location = ?, 
                    picture = ? 
                WHERE username = ?";
    
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param(
            "ssssssss", 
            $Name, $email, $password, $dateOfBirth, $phoneNumber, $location, $profile_Picture, $userName
        );
    
        if ($stmt->execute()) {
            $stmt->close();
            return 1;
        } else {
            $error = "Error executing statement: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }
    function employeeUpdateDataUser($id, $userName, $password, $status, $connectionObject) {
        $sql = "UPDATE employee SET 
                    username = ?, 
                    password = ?, 
                    status = ? 
                WHERE employee_Id = ?";
    
        $stmt = $connectionObject->prepare($sql);
        if (!$stmt) {
            return "Error preparing statement: " . $connectionObject->error;
        }
    
        $stmt->bind_param("sssi", $userName, $password, $status, $id);
    
        if ($stmt->execute()) {
            $stmt->close();
            return 1; 
        } else {
            $error = "Error executing statement: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }
    
    function sellerUpdateDataUser($id, $userName, $password, $status, $connectionObject) {
        $sql = "UPDATE seller SET 
                    username = ?, 
                    password = ?, 
                    status = ? 
                WHERE seller_Id = ?";
    
        $stmt = $connectionObject->prepare($sql);
        if (!$stmt) {
            return "Error preparing statement: " . $connectionObject->error;
        }
    
        $stmt->bind_param("sssi", $userName, $password, $status, $id);
    
        if ($stmt->execute()) {
            $stmt->close();
            return 1; 
        } else {
            $error = "Error executing statement: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }
    
    // Function to login  in the database
    function login($userName, $password, $connectionObject) {
        $sql = "SELECT username, role FROM (
            SELECT username, password, role FROM admin
            UNION 
            SELECT username, password, role FROM customer
            UNION 
            SELECT username, password, role FROM employee
            UNION 
            SELECT username, password, role FROM seller
        ) AS combined 
        WHERE username = ? AND password = ?";
    
        if ($stmt = $connectionObject->prepare($sql)) {
            $stmt->bind_param("ss", $userName, $password);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close(); 
            return $result;
        } else {
            die("Query preparation failed: " . $connectionObject->error);
        }
    }

    public function numberOfAdmin($conn) {
        $sql = "SELECT COUNT(*) as count FROM admin"; // Change 'admin' to your actual admin table name
        $result = $conn->query($sql);
        return $result;
    }

    public function numberOfCustomer($conn) {
        $sql = "SELECT COUNT(*) as count FROM customer"; // Adjust table name if needed
        return $conn->query($sql);
    }

    public function numberOfseller($conn) {
        $sql = "SELECT COUNT(*) as count FROM seller"; // Adjust table name if needed
        return $conn->query($sql);
    }

    public function numberOfEmployee($conn) {
        $sql = "SELECT COUNT(*) as count FROM employee"; // Adjust table name if needed
        return $conn->query($sql);
    }
    
    // Function to close the database connection
    public function closeCon($connectionObject) {
        $connectionObject->close();
    }
}
?>
