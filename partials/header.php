<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;600;700&family=Raleway:ital,wght@0,300;0,400;0,500;1,200;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body class="body d-flex flex-column min-vh-100">

<?php
require 'config/database.php'; //FUNCTIONS TO ACCESS DATABASE
// Initialize the session
session_start();

?>
<nav  class="navbar navbar-expand-lg bg-body-tertiary" >
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation" id="dropDownButton" onclick="displayNone">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="<?php echo ROOT_URL ?>">
      <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16">
      <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
      </svg>
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
        <li class="nav-item">
          <a class="nav-link active" href="#!">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#!">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#!">Contact</a>
        </li>
        <?php if(!isset($_SESSION['user-data'])) : ?><!--it doesn't show when signed in-->
          <li class="nav-item">
            <a class="nav-link active" href="<?php echo ROOT_URL ?>signin.php">Sign In</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
    <?php if(isset($_SESSION['user-data'])) : ?>
      <div id="navbarNavDarkDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['user-data']['firstname'] ?>
          </button>
          <ul class="dropdown-menu dropdown-menu-dark position-absolute" style="left: -55px;">
            <li><a class="dropdown-item" href="<?php echo ROOT_URL?>manage-post.php">Dashboard</a></li>
            <li><a class="dropdown-item" href="<?php echo ROOT_URL?>logout.php">Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <?php endif; ?>
  </div>
</nav>

<script>
const dropDownButton = document.getElementById('dropDownButton');
const dropDownPersonal = document.getElementById('navbarNavDarkDropdown');
dropDownButton.addEventListener('click', function displayNone(){
  dropDownPersonal.classList.toggle('d-none');
});

</script>