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
		if(empty($_POST['category_id'])){//NO FUNCIONA-----------------------
				$_SESSION['addFormErr'] = "Select category";
				returnFormPage();
		}else{
			$postData['category_id'] = $_POST['category_id'];
		}
		$postData['author_id'] = $_SESSION['user-data']['id'];
		$postData['is_featured'] = "0";

		$file = $_FILES["thumbnail"];

				//CHECK FORMAT ------NO FUNCIONA EL CHEQUEO DE SI ESTá O NO ESTÁ AÑADIDO EL ARCHIVO
			$target_dir = "images/";
			$file_name = time();
			$file_format = $file["type"];
			$file_format = strtolower(substr(strrchr($file_format, '/'), 1));
			if(!$file_format === "png" || !$file_format === "jpge" || !$file_format === "jpg"){
				$_SESSION['addFormErr'] = "Sorry, only JPG, JPEG & PNG files are allowed.";
				returnFormPage();
			}
			//CHECK SIZE
			if($file["size"] > 504800){
				$_SESSION['addFormErr'] = "A maximum of 200KB File Size supported.";
				returnFormPage();
			}
			
			// session_unset();//Remove previous variables -> the variable removed is "addFormErr"
			move_uploaded_file($file["tmp_name"], $target_dir . $file_name . "." . $file_format);
			$postData['thumbnail'] = $file_name . "." . $file_format;
			if(insertPost($postData)){
					$_SESSION['postSuccess'] = "Post successfully added.";
					header('Location: dashboard.php');
					die();
			}else{
				$_SESSION['addFormErr'] = "There was an error adding your post.";
			}
			
			
}

    



?>

