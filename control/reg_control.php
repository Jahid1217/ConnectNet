<?php
//require "../db.php";

$FullNameError= "";
$emailError= "";
$phoneNoError= "";
$phoneNoError= "";
$BirthDateError= "";
$addressError= "";
$roleError= "";
$departmentError= "";
$usernameError= "";
$passwordError= "";
$emptypeError= "";
$supervisorError= "";
$fileError= "";
$termsError= "";

$hasError = 0;


if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $FullName= trim($_POST["FullName"]); 
        $Email= trim($_POST["Email"]); 
        $PhoneNo = trim($_POST["PhoneNo"]);
        $BirthDate= $_POST["BirthDate"];
        $Address=trim($_POST["Address"]); 
        $Role= $_POST["Role"];
        $Department= $_POST["Department"];
        $UserName=trim($_POST["UserName"]); 
        $Password= $_POST["Password"];
        $Emptype= $_POST["Emptype"];
        $myfile= $_POST["file"];
        //$myfile= $_FILES["myfile"]["name"];
        


        //name validation
        if(empty($FullName)){
            $firstNameError = "Please enter the full name.";
            $hasError++;
        }
        elseif(strlen($FullName)< 4){
           $firstNameError ="Full name must be at least 4 charecters";
           $hasError++;
        }
        //email validation
        if(empty($Email)){
            $emailErrorr= "Email is required";
            $hasError++;
        }
        elseif(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            $emailErrorr= "Invalid email format";
            $hasError++;
        }
        elseif(!str_ends_with($Email, '@aiub.edu')){
             $emailErrorr= "Email must contaion aiub.edu domain";
             $hasError++;
        }

        //phone no validation
        if(empty($PhoneNo)){
            $phoneNoError= "Phone no is required";
            $hasError++;
        }
        elseif(!ctype_digit($PhoneNo)){
           $phoneNoError= "Phone no must only contain digits";
           $hasError++;
        }

        if(empty($BirthDate)){
            $BirthDateError = "Please enter date of birth";
            $hasError++;
        }
        if(empty($Address)){
            $addressError = "Please enter Address";
            $hasError++;
        }

        if(empty($Role)){
            $roleError= "PLease select a role";
            $hasError++;
        }

        if(empty($Department)){
            $departmentError= "PLease select a Department";
            $hasError++;
        }

        if(empty($UserName)){
            $usernameError= "Please enter User Name";
            $hasError++;
        }
        if(empty($Password)){
            $passwordError=  "Please enter Password ";
            $hasError++;
        }

        if(empty($_POST["supervisor"])){
            $supervisorError= "Please select this field";
        }

        if(empty($Emptype)){
            $emptypeError= "PLease select Employee type";
        }
    
        if ($hasError === 0) {
            $tableName= "employee";
            $mydb = new mydb();
            $conobj = $mydb->openCon();
            $result=$mydb->insertData($_REQUEST["Fullname"], $_REQUEST["Email"], $_REQUEST["Password"], $_REQUEST["PhoneNo"],$_REQUEST["BirthDate"],$_REQUEST["Address"],
            $_REQUEST["Role"],$_REQUEST["Department"],$_REQUEST["UserName"],$_REQUEST["Emptype"],$_REQUEST["supervisor"],$_REQUEST["myfile"],$abcd, $conobj );
            
           /* $data = [
                "Full Name" => $FullName,
                "Email" => $Email,
                "Phone No" => $PhoneNo,
                "Date_of_Birth" => $cc,
                "Address" => $Address,
                "Role" => $Role,
                "Department" => $Department,
                "User-Name" => $UserName,
                "Password" => $Password,
                "Emptype" => $Emptype,
                "supervisor" => $supervisor,
                "File" => $myfile,
            ];
    
            $json = json_encode($data); // Encode to JSON
    
            if (file_put_contents("../data/userdata.json", $json)) {
                echo "Data saved successfully.";
            } else {
                echo "Failed to save data.";
            } */
        }   
       
}
?>