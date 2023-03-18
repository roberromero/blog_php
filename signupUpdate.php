

<?php
session_start(); //Needed to use $_SESSION global variable
$firstname = $lastname = $username = $email = $password = $avatar = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["firstname"])) {
    $_SESSION['formError'] = "First name is required";
    header('Location: signup.php');
    die();
  }elseif(strlen($_POST["firstname"]) > 20 ){//Check string lenght -> no more than 20 characters
    $_SESSION['formError'] = "No more than 20 characters";
     header('Location: signup.php');
    die();
  }else {
    $firstname = test_input($_POST["firstname"]);
    echo $_POST["firstname"];
  }

  if (empty($_POST["lastname"])) {
    $_SESSION['formError'] = "Last name is required";
  } else {
    $lastname = test_input($_POST["lastname"]);
    echo $_POST["lastname"];
  }
  
  if (empty($_POST["username"])) {
    $_SESSION['formError'] = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
  }

  if (empty($_POST["email"])) {
    $_SESSION['formError'] = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }

  if (empty($_POST["password"])) {
    $_SESSION['formError'] = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
  }
  if (empty($_POST["avatar"])) {
    $_SESSION['formError'] = "Avatar is required";
  } else {
    $avatar = test_input($_POST["avatar"]);
  }
}


?>





