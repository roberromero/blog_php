<?php

require 'config/constants.php';


//TO SET DATABASE DETAILS
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

//To find if password is in the DDBB
function findPassword($column, $data){
  $conn = connectDatabase();
  $sql = "SELECT password FROM users WHERE $column= '$data'";
  $res = $conn->query($sql);
  return mysqli_fetch_row($res);
  
  $conn->close();
}

//to get all details from a specific user past thoughout parameters
function getUserDetails($data){
  $conn = connectDatabase();
  $sql = "SELECT * FROM users WHERE username= '$data' OR email= '$data'";
  $res = $conn->query($sql);
  return mysqli_fetch_assoc($res);
}

//to get posts if is_featured=1 if not is_featured=0
function getPosts($is_featured){
  $conn = connectDatabase();
  $sql = "SELECT * FROM posts WHERE is_featured=$is_featured";
  $res = $conn->query($sql);
  if($is_featured == 0){
    //Return all posts NO featured
    return mysqli_fetch_all($res, MYSQLI_ASSOC);
  }else{
    //Return only one
    return mysqli_fetch_assoc($res);
  }
}


//To insert a post in DDBB
function insertPost($data){
  $title = $data['title'];
  $body = $data['body'];
  $thumbnail = $data['thumbnail'];
  $category_id = $data['category_id'];
  $author_id = $data['author_id'];
  $is_featured = $data['is_featured'];
  
  $conn = connectDatabase();
  $sql = "INSERT INTO posts (title, body, thumbnail, category_id, author_id, is_featured) 
          VALUES ('$title', '$body', '$thumbnail', '$category_id', '$author_id', '$is_featured' )";
  $res = $conn->query($sql);
  return $res;
} 

?>