<?php 
require_once 'config/database.php';
?>

<?php echo '<pre>'?>
    <?php var_dump($_SESSION);?>
  <?php var_dump($_POST);?>
  <?php var_dump($_FILES);?>
<?php echo '</pre>' ?>

<?php 
$title = $_POST['title'];
$body = $_POST['body'];
// $file = $_FILES["thumbnail"];
$category_id = $_POST['category_id'];
$author_id = $_SESSION['user-data']['id'];
$is_featured = "0";
$_SESSION['addFormErr'];
    if(empty([$_POST['title']])){
        echo "NO TENEMOS TITULO";
    }else{
        echo "SI tenemos título";
    }



    // //CHECK FORMAT
    // $file_format = $file["type"];
    // $file_format = strtolower(substr(strrchr($file_format, '/'), 1));
    // if($file_format === "png" || $file_format === "jpge" || $file_format === "jpg"){
    //   $uploadCheck = true;
    // }else{
    //   $uploadCheck = false;
    //   $_SESSION['formError'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
    //   returnSignUpPage();

    // }
    // //CHECK SIZE
    // if($file["size"] < 204800){
    //   $uploadCheck = true;
    // }else{
    //   $uploadCheck = false;
    //   $_SESSION['formError'] = "A maximum of 200KB File Size supported";
    //   returnSignUpPage();
    // }

    // if($uploadCheck){
    //   session_unset();//Remove previous variables -> the variable removed is "formError"
    //   move_uploaded_file($file["tmp_name"], $target_dir . $file_name . "." . $file_format);
    //   $dataForm['avatar'] = $file_name . "." . $file_format;
    //   saveNewUser($dataForm);//Saves new user in the data base
    //   $_SESSION['formSuccess'] = "Sign Up Success. Please, log in";
    //   header('Location: signup.php');
    //   die();
    
    // }else{
    //   $_SESSION['formError'] = "Error downloading this file";
    //   returnSignUpPage();
    // }
     
    



// insertPost($data);
?>

