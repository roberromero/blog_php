

<?php
session_start(); //Needed to use $_SESSION global variable
$firstname = $lastname = $username = $email = $password = $avatar = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

function returnSignUpPage(){
  header('Location: signup.php');
  die();
}

//CREATE A FUNCTION TO CHECK THAT USERNAME AND EMAIL DON'T EXIST
/////////////////////


//VALIDATION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //FIRST NAME VALIDATION
  if (empty($_POST["firstname"])) {
    $_SESSION['formError'] = "First name is required";
    returnSignUpPage();
  }elseif(strlen($_POST["firstname"]) > 20 ){//Check string lenght -> no more than 20 characters
    $_SESSION['formError'] = "No more than 20 characters";
    returnSignUpPage();
  }else {
    $firstname = test_input($_POST["firstname"]);
  }
  //LAST NAME VALIDATION
  if (empty($_POST["lastname"])) {
    $_SESSION['formError'] = "Last name is required";
    returnSignUpPage();
  }elseif(strlen($_POST["lastname"]) > 20 ){//Check string lenght -> no more than 20 characters
    $_SESSION['formError'] = "No more than 20 characters";
    returnSignUpPage();
  }else {
    $lastname = test_input($_POST["lastname"]);
  }
  //USER NAME VALIDATION
  if (empty($_POST["username"])) {
    $_SESSION['formError'] = "Username is required";
    returnSignUpPage();
    }elseif(strlen($_POST["username"]) > 20 ){//Check string lenght -> no more than 20 characters
      $_SESSION['formError'] = "No more than 20 characters";
      returnSignUpPage();
    }else {
      $username = test_input($_POST["username"]);
    }

  //EMAIL ADDRESS VALIDATION
  if (empty($_POST["email"])) {
    $_SESSION['formError'] = "Email is required";
    returnSignUpPage();
    } else {
        if (filter_var(test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
          $email = test_input($_POST["email"]);
          }else {
          $_SESSION['formError'] = "Email address format is not valid ";
          returnSignUpPage();
        }
    }

  //PASSWORD VALIDATION
  if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
   
      if (strlen($_POST["password"]) < '8') {
        $_SESSION['formError'] = "Your Password Must Contain At Least 8 Characters!";
          returnSignUpPage();
      }
      elseif(!preg_match("#[0-9]+#",test_input($_POST["password"]))) {
        $_SESSION['formError'] = "Your Password Must Contain At Least 1 Number!";
          returnSignUpPage();
      }
      elseif(!preg_match("#[A-Z]+#",test_input($_POST["password"]))) {
        $_SESSION['formError'] = "Your Password Must Contain At Least 1 Capital Letter!";
          returnSignUpPage();
      }
      elseif(!preg_match("#[a-z]+#",test_input($_POST["password"]))) {
        $_SESSION['formError'] = "Your Password Must Contain At Least 1 Lowercase Letter!";
          returnSignUpPage();
      }
      else{
        $password = test_input($_POST["password"]);
      }
    }elseif(empty($_POST["password"])){
          $_SESSION['formError'] = "Please Enter Your Password!";
          returnSignUpPage();
    }else{
      $_SESSION['formError'] = "Please Confirm Your Password!";
      returnSignUpPage();
    }

  
  
  
    //FILE VALIDATION
  if (empty($_FILES["avatar"])) {
  $_SESSION['formError'] = "Avatar is required";
  returnSignUpPage();
  }else {
      $target_dir = "images/";
      $file_name = time();
      $uploadCheck = false;

      //CHECK FORMAT
      $file = $_FILES["avatar"];

      $file_format = $file["type"];
      $file_format = strtolower(substr(strrchr($file_format, '/'), 1));
      if($file_format === "png" || $file_format === "jpge" || $file_format === "jpg"){
        echo "Image Format Valid";
        $uploadCheck = true;
      }else{
        $uploadCheck = false;
        $_SESSION['formError'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
        returnSignUpPage();

      }

      //CHECK SIZE
     
      if($file["size"] < 204800){
        echo "File size supported";
        $uploadCheck = true;
      }else{
        $uploadCheck = false;
        $_SESSION['formError'] = "A maximum of 200KB File Size supported";
        returnSignUpPage();
      }

      if($uploadCheck){
        session_unset();//Remove previous variables -> the variable removed is "formError"
        move_uploaded_file($file["tmp_name"], $target_dir . $file_name . "." . $file_format);
        $_SESSION['formSuccess'] = "Sign Up Success";
        returnSignUpPage();
      }else{
        $_SESSION['formError'] = "Error downloading this file";
        returnSignUpPage();
      }
       
      

    }

   
    // echo '<pre>';
    //   var_dump($_FILES);
    // echo '</pre>';
  }



?>





