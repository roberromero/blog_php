<?php

require 'config/database.php'; //FUNCTIONS TO ACCESS DATABASE
include 'partials/header.php'; //PHP header CODE?
include 'partials/navbar.php'; //PHP navbar CODE


?>



<h2 class="text-center mt-5">SIGN IN</h2>
<div class="container w-50">

  <div class="position-relative pb-5">
    <div class="position-absolute w-100 alert alert-danger" role="alert">
    </div>
    <div class="position-absolute w-100 alert alert-success" role="alert">
    </div>
  </div>
  <form action="signinUpdate.php" 
        method="post" 
        class="pb-3" 
        novalidate>
    <div class="mb-3 pt-4">
      <input type="text"
            class="form-control"
            id="exampleFormControlInput1" 
            name="username" 
            value=""
            placeholder="Introduce your Username or Email">

    </div>
    
    <div class="mb-3">
      <input type="password"
            class="form-control"
            id="exampleFormControlInput2" 
            name="password" 
            value=""
            placeholder="Introduce your Password">
    </div>

<!--     
    <div class="mb-3">
      <input type="hidden"
            class="form-control"
            id="exampleFormControlInput7" 
            name="is_admin"
            value="0"
            >
    </div> -->
    <button type="submit" class="btn btn-success">Sign In</button>
  </form>
  <small>Do you already have an account? <a href="signup.php">Sign in</a></small>
</div>




<?php include 'partials/footer.php' //PHP footer CODE ?>