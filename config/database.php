<?php
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
function saveNewUser(){
    $conn = connectDatabase();
    $sql = "INSERT INTO users(firstname, lastname, username, email, password, avatar, is_admin) 
    VALUES ('John','White','JohnW','john@gmail.com','22ddaa','imagenBlog1.png','0')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
}





?>