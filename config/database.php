<?php

use function PHPSTORM_META\type;

require 'config/constants.php';



function connectDatabase(){
    // Create connection
$conn = new mysqli(BD_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
 return die("Connection failed: " . $conn->connect_error);
}
return $conn;
}

function saveNewUser($dataForm){
    $conn = connectDatabase();
    $fistname = $dataForm['firstname'];
    $lastname = $dataForm['lastname'];
    $username = $dataForm['username'];
    $email = $dataForm['email'];
    $password = $dataForm['password'];
    $avatar = $dataForm['avatar'];
    $is_admin = 0;

    $sql = "INSERT INTO users(firstname, lastname, username, email, password, avatar, is_admin) 
    VALUES ('$fistname','$lastname','$username','$email','$password','$avatar', '$is_admin')";
    if ($conn->query($sql) === TRUE) {
        // echo "New record created successfully";
      } else {
        // echo "Error: " . $sql . "<br>" . $conn->error;
      }
      $conn->close();
}
function checkUsernameEmail($username, $email){
  $conn = connectDatabase();
  $sql = "SELECT * FROM users WHERE username='$username' OR email='$email' ";
  $res = $conn->query($sql);
  return mysqli_num_rows($res);
  //it returns:
  //- true if any row has been found
  //- false if rows no found
  $conn->close();
  
}
//Receives two parameters, column name and data
function findColumn($columnName, $data){
  $conn = connectDatabase();
  $sql = "SELECT * FROM users WHERE $columnName= '$data'";
  $res = $conn->query($sql);
  return mysqli_num_rows($res);
  //it returns:
  //- true if any row has been found
  //- false if rows no found
  $conn->close();
}

function findPassword($column, $data){
  $conn = connectDatabase();
  $sql = "SELECT password FROM users WHERE $column= '$data'";
  $res = $conn->query($sql);
  return mysqli_fetch_row($res);
  
  $conn->close();
}

?>