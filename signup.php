<?php

include 'partials/header.php'; //PHP header CODE?
session_start();//Needed to use $_SESSION global variable

?>

<!--HTML CODE-->
<h1 class="text-center mt-5 title">SIGN UP</h1>


<div class="container w-50">

  <div class="position-relative pb-5">
    <div class="position-absolute w-100 alert alert-danger <?php echo !$_SESSION['formError'] ? 'invisible' : '' ?>" role="alert"> 
      <?php echo $_SESSION['formError'] ?>
    </div>
    <div class="position-absolute w-100 alert alert-success <?php echo !$_SESSION['formSuccess'] ? 'invisible' : '' ?>" role="alert">
    <?php echo $_SESSION['formSuccess'] ?>
    </div>
  </div>
  <form action="signup-logic.php" 
        method="post" 
        enctype="multipart/form-data" 
        class="pb-3" 
        novalidate> <!--Adding due to the input file-->
    <div class="mb-3 pt-4">
      <!-- <label for="exampleFormControlInput1" class="form-label">First Name</label> -->
      <input type="text"
            class="form-control"
            id="exampleFormControlInput1" 
            name="firstname" 
            value="<?php echo $_SESSION['signup-data']['firstname']; ?>"
            placeholder="First name">

    </div>
    
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput2" class="form-label">First Name</label> -->
      <input type="text"
            class="form-control"
            id="exampleFormControlInput2" 
            name="lastname" 
            value="<?php echo $_SESSION['signup-data']['lastname']; ?>"
            placeholder="Last name">
    </div>
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput3" class="form-label">Username</label> -->
      <input type="text"
            class="form-control"
            id="exampleFormControlInput3" 
            name="username" 
            value="<?php echo $_SESSION['signup-data']['username']; ?>"
            placeholder="Username">
    </div>
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput4" class="form-label">Email Address</label> -->
      <input type="email"
            class="form-control"
            id="exampleFormControlInput4" 
            name="email" 
            value="<?php echo $_SESSION['signup-data']['email']; ?>" 
            placeholder="Email address">
    </div>
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput5" class="form-label">First Name</label> -->
      <input type="password"
            class="form-control"
            id="exampleFormControlInput5" 
            name="password" 
            placeholder="Password">
    </div>
    <div class="mb-3">
      <!-- <label for="exampleFormControlInput6" class="form-label">First Name</label> -->
      <input type="password"
            class="form-control"
            id="exampleFormControlInput6" 
            name="cpassword"
            placeholder="Confirm your password">
    </div>
    <div class="mb-3">
      <label for="formFile" class="form-label">Photograph</label>
      <input class="form-control"
             type="file"
             id="formFile"
             name="avatar">

    </div>
    
    <div class="mb-3">
      <input type="hidden"
            class="form-control"
            id="exampleFormControlInput7" 
            name="is_admin"
            value="0"
            >
    </div>
    <button type="submit" class="btn" style="background-color:#7272DB; color:white;">Sign Up</button>
  </form>
  <small>Do you already have an account? <a href="<?php echo ROOT_URL?>signin.php">Sign in</a></small>
</div>

<?php include "partials/footer.php" //PHP footer CODE ?>