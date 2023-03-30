<?php
require_once "./config/database.php";
session_start();


//FUNCTIONS
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  function returnManagePostPage(){
      header('Location:' . getenv('HTTP_REFERER'));
      die();
    }
  $postData = []; //Associate array
  
  //VALIDATION
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if(empty($_POST['title'])){
              $_SESSION['addFormErr'] = "Title needed";
              returnManagePostPage();
      }elseif(strlen($_POST["title"]) > 255){
        $_SESSION['addFormErr'] = "No more than 255 character for the title";
        returnManagePostPage();
      }
      else{
          $postData['title'] = test_input($_POST['title']);
      }
      if(empty($_POST['body'])){
              $_SESSION['addFormErr'] = "Body needed";
              returnManagePostPage();
      }else{
          $postData['body'] = test_input($_POST['body']);
      }
      if(empty($_POST['category_id'])){
              $_SESSION['addFormErr'] = "Select category";
              returnManagePostPage();
      }else{
          $postData['category_id'] = $_POST['category_id'];
      }
      $postData['id'] = $_POST['id'];
  
          
      //FILE VALIDATION
      if ($_FILES['thumbnail']['name'] == "") {
          $_SESSION['addFormErr'] = "Photo is required.";
          returnManagePostPage();
      }else {
        $target_dir = "images/";
        $file_name = time();
        $uploadCheck = false;
  
        //CHECK FORMAT
        $file = $_FILES["thumbnail"];
  
        $file_format = $file["type"];
        $file_format = strtolower(substr(strrchr($file_format, '/'), 1));
        if($file_format === "png" || $file_format === "jpeg" || $file_format === "jpg"){
          $uploadCheck = true;
        }else{
          $uploadCheck = false;
          $_SESSION['addFormErr'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
          returnManagePostPage();
        }
        //CHECK SIZE
        if($file["size"] < 604800){
          $uploadCheck = true;
        }else{
          $uploadCheck = false;
          $_SESSION['addFormErr'] = "A maximum of 600KB File Size supported.";
          returnManagePostPage();
        }
  
        if($uploadCheck){
          // session_unset();//Remove previous variables -> the variable removed is "formError"
          move_uploaded_file($file["tmp_name"], $target_dir . $file_name . "." . $file_format);
          $postData['thumbnail'] = $file_name . "." . $file_format;
          updatePost($postData);//Saves changes in the post in the data base
          unset( $_SESSION['addFormErr']);
          unset($_SESSION['form-data']);
          $oldPhoto = './images/'. $_POST['oldThumbnail'];
          unlink($oldPhoto);
          $_SESSION['postSuccess'] = "Post edited successfully.";
          header('Location:' . getenv('HTTP_REFERER'));
          die();
        
        }else{
          $_SESSION['addFormErr'] = "Error downloading this file.";
          returnManagePostPage();
        }
      }
  
              
  }

?>