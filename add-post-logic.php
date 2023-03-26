<?php 
require_once 'config/database.php';
session_start();
?>

<?php //echo '<pre>'?>
  <?php //var_dump($_FILES["thumbnail"]);?>
<?php //echo '</pre>' ?>

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
    header('Location: dashboard.php');
    die();
  }
$postData = []; //Associate array

//VALIDATION
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST['title'])){
            $_SESSION['addFormErr'] = "Title needed";
            returnFormPage();
    }else{
        $postData['title'] = test_input($_POST['title']);
    }
    if(empty($_POST['body'])){
            $_SESSION['addFormErr'] = "Body needed";
            returnFormPage();
    }else{
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

        
    //FILESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSS copiar todo de signup



			
}

    



?>

