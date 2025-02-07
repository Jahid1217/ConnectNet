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

    function insertData($FullName, $Email, $Password, $PhoneNo, $BirthDate, $Location, $Role, $Department, $UserName, $Emptype, $connectionObject) {
        $sql = "INSERT INTO employee (name, email, username, password, phoneNumber, DOB, location, employee_role, department, employeeType) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    
        if ($stmt = $connectionObject->prepare($sql)) { 
            $stmt->bind_param("ssssssssss", $FullName, $Email, $UserName, $Password, $PhoneNo, $BirthDate, $Location, $Role, $Department, $Emptype);
            
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
       
    function getUserByID($tableName, $connectionObject, $id) {
        $sql = "SELECT * FROM $tableName WHERE employee_Id = ?";
        $stmt = $connectionObject->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $results = $stmt->get_result();
        return $results;
    }
    function updateDataUser($tableName, $connectionObject, $id, $Name, $email,$password, $dateOfBirth, $phoneNumber, $location) {
        $sql = "UPDATE $tableName 
                SET name = ?, email = ?, password = ?, phoneNumber = ?, DOB = ?, location = ? 
                WHERE employee_Id = ?";

        if ($stmt = $connectionObject->prepare($sql)) {
            $stmt->bind_param("ssssssi", $Name, $email,$password, $phoneNumber, $dateOfBirth ,$location, $id);
            
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


    function conClose($connectionObject){
        $connectionObject->close();
    }
}

?>