<?php
class myDB {
    // Function to open a connection to the database
    public function openCon() {
        $DBHost = "localhost"; // Hostname for the database
        $DBUser = "root";      // Database username
        $DBPassword = "";      // Database password
        $DBName = "connectnet";   // Database name

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
        $sql = "INSERT INTO admin (name, email,userName,password, DOB, phoneNumber, adminRole, location, picture, referenceName, referenceEmail, referencePhone, referenceNameTwo, referenceEmailTwo, referencePhoneTwo) 
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
        $sql = "SELECT id,name, email,userName, DOB, phoneNumber, adminRole, location, picture, referenceName, referenceEmail, referencePhone, referenceNameTwo, referenceEmailTwo, referencePhoneTwo FROM $tableName";
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
        // Create SQL with placeholders
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
    
        // Bind parameters
        $stmt->bind_param(
            "sssssssssssssssi", 
            $Name, $email, $userName, $password, $dateOfBirth, $phoneNumber, $adminRole, $location, $profile_Picture, $referenceName, $referenceEmail, $referencePhone, $referenceNameTwo, $referenceEmailTwo, $referencePhoneTwo, $id
        );
    
        // Execute the statement
        if ($stmt->execute()) {
            $stmt->close();
            return 1; // Success
        } else {
            $error = "Error executing statement: " . $stmt->error;
            $stmt->close();
            return $error;
        }
    }
    // Function to login  in the database
    function login($userName, $password,$role, $tableName, $connectionObject) {
        if($role == 'admin'){
            $sql = "SELECT * FROM $tableName WHERE userName = ? AND password = ?";
            $stmt = $connectionObject->prepare($sql);
            $stmt->bind_param("ss", $userName, $password);
            $stmt->execute();
            $adminResults = $stmt->get_result();
            $stmt->close();
            return $adminResults;
            echo"success".$adminResults;
        }
        else if($role == 'customer'){
            $sql = "SELECT * FROM customer WHERE userName = ? AND password = ?";
            $stmt = $connectionObject->prepare($sql);
            $stmt->bind_param("ss", $userName, $password);
            $stmt->execute();
            $customerResults = $stmt->get_result();
            $stmt->close();
            return $customerResults;
            echo"success".$customerResults;
        }
        else if($role == 'seller'){
            $sql = "SELECT * FROM seller WHERE email = ? AND password = ?";
            $stmt = $connectionObject->prepare($sql);
            $stmt->bind_param("ss", $userName, $password);
            $stmt->execute();
            $sellerResults = $stmt->get_result();
            $stmt->close();
            return $sellerResults;
            echo"success".$sellerResults;
        }
        else if($role == 'employee'){
            $sql = "SELECT * FROM employee WHERE userName = ? AND password = ?";
            $stmt = $connectionObject->prepare($sql);
            $stmt->bind_param("ss", $userName, $password);
            $stmt->execute();
            $employeeResults = $stmt->get_result();
            $stmt->close();
            return $employeeResults;
            echo"success".$employeeResults;
        }
        else{
            echo"error";
        }
    }
    
    // Function to close the database connection
    public function closeCon($connectionObject) {
        $connectionObject->close();
    }
}
?>
