<?php

//CREAR FUNCIÓN PARA DEVOLVER UN ASSOCIATIVE ARRAY Y UTILIZAR DIFERENTES DATOS PARA EL HEADER Y ENTRAR EN LA CUENTA DE CADA USUARIO

// Include config file
require_once "./config/database.php";
// Initialize the session
session_start();
//TO CLEAR INPUTS////////////////////////////////////
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


function returnSignInPage(){
    header('Location: signin.php');
    die();
}

function verifyPassword($column, $data, $password){
    $res = findPassword($column, $data); //it returns hashed password from DDBB
    $resVerified = password_verify($password, $res[0]); //verified the password
    $resReturn = false;
    if($resVerified == true){
        $resReturn = true;
        return $resReturn;
    }
    return $resReturn;
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
                $_SESSION['passwordValidated'] = verifyPassword($columnName, $data, $password);
                
                if($_SESSION['passwordValidated']){
                    $_SESSION['formValid'] = "Signed in successfully. Please, log in";
                }else{
                   $_SESSION['formErr'] = "Correct email - Wrong password";
                   $_SESSION['username'] = test_input($_POST["username"]); 
                }
                returnSignInPage();
            }else{
                $_SESSION['formErr'] = "Email not found"; 
                returnSignInPage();
            }  
        }else{
            $_SESSION['formErr'] = "Email format not valid";
            returnSignInPage();
        }
       
    }else{//checking username if doesn't contain more than 20 cha or  doesn't contain @

        $columnName = "username";
        if(findColumn($columnName, $data)){//returns true if email found in DDBB
            $_SESSION['passwordValidated'] = verifyPassword($columnName, $data, $password);
                
                if($_SESSION['passwordValidated']){
                    $_SESSION['formValid'] = "Signed in successfully. Please, log in";
                }else{
                   $_SESSION['formErr'] = "Correct username - Wrong password"; 
                }
                returnSignInPage();
        }else{
            $_SESSION['formErr'] = "Username not found in DDBB";
            returnSignInPage();
        }  
    }


  }
?>

