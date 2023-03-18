<?php

require 'config/database.php'; //FUNCTIONS TO ACCESS DATABASE
include 'partials/header.php'; //PHP header CODE?
include 'partials/navbar.php'; //PHP navbar CODE
session_start();//Needed to use $_SESSION global variable

?>


<!--HTML CODE-->
<h2 class="text-center mt-5 mb-3">SIGN IN</h2>

<div class="alert alert-danger<?php echo !$_SESSION['formError'] ? 'd-none' : '' ?>" role="alert">
  <?php echo $_SESSION['formError'] ?>
</div>
<div class="container w-50">
  <form action="signupUpdate.php" 
        method="post" 
        enctype="multipart/form-data"
        novalidate> <!--Adding due to the input file-->
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput1" class="form-label">First Name</label> -->
      <input type="text"
            class="form-control"
            id="exampleFormControlInput1" 
            name="firstname"
            placeholder="Introduce your first name">

    </div>
    
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput2" class="form-label">First Name</label> -->
      <input type="text"
            class="form-control"
            id="exampleFormControlInput2" 
            name="lastname"
            placeholder="Introduce your last name">
    </div>
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput3" class="form-label">Username</label> -->
      <input type="text"
            class="form-control"
            id="exampleFormControlInput3" 
            name="username"
            placeholder="Introduce your username">
    </div>
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput4" class="form-label">Email Address</label> -->
      <input type="email"
            class="form-control"
            id="exampleFormControlInput4" 
            name="email"
            placeholder="Introduce your email address">
    </div>
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput5" class="form-label">First Name</label> -->
      <input type="password"
            class="form-control"
            id="exampleFormControlInput5" 
            name="password"
            placeholder="Introduce your password">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Introduce your photograph</label>
      <input class="form-control"
             type="file"
             id="formFile"
             name="avatar"
             placeholder="Introduce your photograph">

    </div>
    
    <div class="mb-3">
      <input type="hidden"
            class="form-control"
            id="exampleFormControlInput7" 
            name="is_admin"
            value="0"
            >
    </div>
    <button type="submit" class="btn btn-success">Sign Up</button>
  </form>
  
</div>

<?php include 'partials/footer.php' //PHP footer CODE ?>