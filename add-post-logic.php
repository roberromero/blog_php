<?php 
require_once 'config/database.php';
session_start();
var_dump($_POST);
?>


<?php 
//FUNCTIONS
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function returnFormPage(){
    $_SESSION['form-data'] = $_POST;
    header('Location:' . getenv('HTTP_REFERER'));
    die();
  }
$postData = []; //Associate array

//VALIDATION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['title'])){
            $_SESSION['addFormErr'] = "Title needed";
            returnFormPage();
    }elseif(strlen($_POST["title"]) > 255){
      $_SESSION['addFormErr'] = "No more than 255 character for the title";
      returnFormPage();
    }
    else{
        $postData['title'] = test_input($_POST['title']);
    }
    if(empty($_POST['body'])){
            $_SESSION['addFormErr'] = "Body needed";
            returnFormPage();
    }elseif(strlen($_POST['body']) > 2000){
            $_SESSION['addFormErr'] = "2000 characters maximum";
            returnFormPage();
    }
    else{
        $postData['body'] = test_input($_POST['body']);
    }
    if(empty($_POST['category_id'])){
            $_SESSION['addFormErr'] = "Select category";
            returnFormPage();
    }else{
        $postData['category_id'] = $_POST['category_id'];
    }
    $postData['author_id'] = $_SESSION['user-data']['id'];
    $postData['is_featured'] = "0";

        
    //FILE VALIDATION
    if ($_FILES['thumbnail']['name'] == "") {
        $_SESSION['addFormErr'] = "Photo is required.";
        returnFormPage();
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
        returnFormPage();
      }
      //CHECK SIZE
      if($file["size"] < 804800){
        $uploadCheck = true;
      }else{
        $uploadCheck = false;
        $_SESSION['addFormErr'] = "A maximum of 600KB File Size supported.";
        returnFormPage();
      }

      if($uploadCheck){
        // session_unset();//Remove previous variables -> the variable removed is "formError"
        move_uploaded_file($file["tmp_name"], $target_dir . $file_name . "." . $file_format);
        $postData['thumbnail'] = $file_name . "." . $file_format;
        insertPost($postData);//Saves new post in the data base
        unset( $_SESSION['addFormErr']);
        unset($_SESSION['form-data']);
        $_SESSION['postSuccess'] = "Post added successfully.";
        header('Location: add-post.php');
        die();
      
      }else{
        $_SESSION['addFormErr'] = "Error downloading this file.";
        returnFormPage();
      }
    }

			
}

    



?>

