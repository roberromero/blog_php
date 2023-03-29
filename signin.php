<?php

include_once 'partials/header.php'; //PHP header CODE?
session_start();
?>

<h2 class="text-center mt-5">SIGN IN</h2>
<div class="container w-50">

  <div class="position-relative pb-5">
    <div class=" position-absolute w-100 alert alert-danger <?php echo !$_SESSION['formErr'] ? 'invisible' : '' ?>" role="alert">
        <?php 
        echo $_SESSION['formErr'];
        unset($_SESSION['formErr']);
        ?>
    </div>
    <div class=" position-absolute w-100 alert alert-success <?php echo !$_SESSION['formValid'] ? 'invisible' : '' ?>" role="alert">
        <?php 
        echo $_SESSION['formValid'];
        unset($_SESSION['formValid']);
        ?>
    </div>
  </div>
  <form action="signin-logic.php" 
        method="post" 
        class="pb-3" 
        novalidate>
    <div class="mb-3 pt-4">
      <input type="text"
            class="form-control"
            id="exampleFormControlInput1" 
            name="username" 
            value="<?php 
              echo $_SESSION['username'];
              unset($_SESSION['username']);
            ?>"
            placeholder="Username or Email">

    </div>
    
    <div class="mb-3">
      <input type="password"
            class="form-control"
            id="exampleFormControlInput2" 
            name="password" 
            value=""
            placeholder="Password">
    </div>
    <button type="submit" class="btn btn-success">Sign In</button>
  </form>
  <small>Don't you have an account? <a href="<?php echo ROOT_URL?>signup.php">Sign Up</a></small>
</div>




<?php include 'partials/footer.php' //PHP footer CODE ?>