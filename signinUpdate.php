<?php
// Initialize the session
session_start();

// Include config file
require_once "./config/database.php";

//TO CLEAR INPUTS////////////////////////////////////
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
function verifyPassword($column, $data, $password){

    $res = findPassword($column, $data); //it returns hashed password from DDBB
    $resVerified = password_verify($password, $res[0]); //verified the password
    if($resVerified == true){
        echo "password found";
    }else{
        echo "password not found";
    }
}

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = test_input($_POST['password']);
    $data = test_input($_POST["username"]);
    $findme   = '@';
    $pos = strpos($data, $findme);

    if(strlen(test_input($_POST['username'])) > 20 || $pos){//checking email if contains more than 20 cha or @

        if(filter_var(test_input($_POST["username"]), FILTER_VALIDATE_EMAIL)){//if email is valid
            $columnName = "email";
            // echo "es un email";
            if(findColumn($columnName, $data)){//returns true if email found in DDBB
                // echo "email found in DDBB";
                verifyPassword($columnName, $data, $password);
            }else{
                echo "email not found";
            }  
        }else{
             $_SERVER['formErr'] = "Email not valid format";
             echo "Email not valid";
        }
       
    }else{//checking username if doesn't contain more than 20 cha or  doesn't contain @

        $columnName = "username";
        if(findColumn($columnName, $data)){//returns true if email found in DDBB
        echo "username found in DDBB";
        }else{
            echo "username not found";
        }  
    }


    
    // test_input($_POST['password']);



    // findColumn($columnName, $data);
  }
?>

