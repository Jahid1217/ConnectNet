<?php
class myDB{
    function openCon(){
        
        $DBHost = "localhost";
        $DBuser = "root";
        $DBpassword = "";
        $DBname = "connectnet";

        $connectionObject = new mysqli($DBHost, $DBuser, $DBpassword, $DBname);

        if ($connectionObject->connect_error) {
            die("Database Connection Failed: " . $connectionObject->connect_error);
        }
        
        return $connectionObject;
    }

    function insertData($FullName, $Email, $Password, $PhoneNo, $BirthDate, $Location, $Role, $Department, $UserName, $Emptype, $supervisor, $connectionObject) {
        $sql = "INSERT INTO employee (name, email, username, password, phoneNumber, DOB, location, employee_role, department, employeeType, supervisor) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        if ($stmt = $connectionObject->prepare($sql)) { 
            $stmt->bind_param("sssssssssss", $FullName, $Email, $UserName, $Password, $PhoneNo, $BirthDate, $Location, $Role, $Department, $Emptype, $supervisor);
            
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
    
            $stmt->close();
        } else {
            return 0;
        }
    }

    function insertfeedback($user_name, $name, $email, $issue_type, $message, $connectionObject) {
        $sql = "INSERT INTO feedback (user_name, f_user_name, f_email, issue_type, message)
                VALUES (?, ?, ?, ?, ?)";
    
        if ($stmt = $connectionObject->prepare($sql)) {
            $stmt->bind_param("sssss", $user_name, $name, $email, $issue_type, $message);
    
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
    
            $stmt->close();
        } else {
            return 0;
        }
    }
    
    function FeedbackShowAll($connectionObject){
        $sql = "SELECT * FROM feedback";
        $resutlts = $connectionObject->query($sql);
        return $resutlts;
    }

    function showAll($tableName,$connectionObject){
        $sql = "SELECT * FROM $tableName";
        $resutlts = $connectionObject->query($sql);
        return $resutlts;
    }
       
    function getUserByUsername($tableName, $connectionObject, $username) {
        $sql = "SELECT * FROM $tableName WHERE username = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    
    function getEmployeeDetails($connectionObject, $username) {
        $query = "SELECT * FROM employee WHERE username = ?";
        $stmt = $connectionObject->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    function updateDataUser($tableName, $connectionObject, $name, $email, $phone, $dob, $address, $profilePicture , $username) {
        $sql = "UPDATE $tableName 
                SET name = ?, email = ?, phoneNumber = ?, DOB = ?, location = ?, picture = ? 
                WHERE username = ?";

        if ($stmt = $connectionObject->prepare($sql)) {
            $stmt->bind_param("sssssss", $name, $email, $phone, $dob, $address, $profilePicture , $username);
            
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;  
            }
        } else {
            return 0;  
        }
    }

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

    function feedbackStatusUpdate($id,$status, $connectionObject){
        $sql = "UPDATE feedback SET Status =? WHERE feedback_Id  =?";
        $stmt = $connectionObject->prepare($sql);

        $stmt->bind_param("si",$status, $id);

        if ($stmt->execute()) {
            $stmt->close();
            return 1; 
        } else {
            $stmt->close();
            return "Error executing statement: ". $stmt->error;
        }
    }


    function updatePassword($tableName, $connectionObject, $new_password, $username) {
        $sql = "UPDATE $tableName SET password = ? WHERE username = ?";
    
        if ($stmt = $connectionObject->prepare($sql)) {
            $stmt->bind_param("ss", $new_password, $username);
    
            if ($stmt->execute()) {
                return 1;
            } else {
                return 0;
            }
    
            $stmt->close();
        } else {
            return 0;
        }
    }

    function conClose($connectionObject){
        $connectionObject->close();
    }
}

?>