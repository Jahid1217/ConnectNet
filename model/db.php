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

        // Check for connection errors
        if ($connectionObject->connect_error) {
            die("Connection failed: " . $connectionObject->connect_error);
        }

        return $connectionObject;
    }

    public function insertData( $Name, $email, $password,$userName, $dateOfBirth, $phoneNumber, $adminRole, $location, $profile_Picture, $referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo, $connectionObject) 
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
    
    function getUserByID($tableName, $connectionObject, $id) {
        $sql = "SELECT * FROM $tableName WHERE id = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
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
    function updateDataUser($id, $Name, $email, $userName, $password, $dateOfBirth, $phoneNumber, $adminRole, $location, $profile_Picture, $referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo, $tableName, $connectionObject) {

        $sql = "UPDATE $tableName SET 
                    name = ?, 
                    email = ?, 
                    username = ?, 
                    password = ?, 
                    DOB = ?, 
                    phoneNumber = ?, 
                    adminRole = ?, 
                    location = ?, 
                    picture = ?, 
                    referenceName = ?, 
                    referenceEmail = ?, 
                    referencePhone = ?, 
                    referenceNameTwo = ?, 
                    referenceEmailTwo = ?, 
                    referencePhoneTwo = ? 
                WHERE id = ?";
        
        $stmt = $connectionObject->prepare($sql);
        if ($stmt === false) {
            return "Error preparing statement: " . $connectionObject->error;
        }

        $stmt->bind_param(
            "sssssssssssssssi", 
            $Name, $email, $userName, $password, $dateOfBirth, $phoneNumber, $adminRole, $location, $profile_Picture, $referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo, $id
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
    
    // Function to close the database connection
    public function closeCon($connectionObject) {
        $connectionObject->close();
    }
}
?>
