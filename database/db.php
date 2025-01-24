<?php
class myDB{
    function openCon(){
        
        $DBHost = "localhost";
        $DBuser = "root";
        $DBpassword = "";
        $DBname = "connectnet";

        $connectionObject = new mysqli($DBHost, $DBuser, $DBpassword, $DBname);
        return $connectionObject;
    }

    function insertData($FullName,$Email, $Password,$PhoneNo, $BirthDate, $Address, $Role,$Department, $UserName, $Emptype ,$myfile ,$table,$connectionObject){
        $sql = "INSERT INTO $table (name,email,password,phoneNumber,DOB, location, Role, department, userName, employeeType, CV ) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($connectionObject->query($sql)){
             return 1;
             echo "1";
        }
        else{
            return 0;
            echo "0";
        }
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


    function conClose($connectionObject){
        $connectionObject->close();
    }
}

?>