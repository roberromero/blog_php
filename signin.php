<?php
include_once 'partials/header.php'; //PHP header CODE?

?>

<h1 class="text-center mt-5 title">SIGN IN</h1>
<div class="container w-50">

  <div class="position-relative pb-5">
    <div class=" position-absolute w-100 alert alert-danger <?php 
    if(isset($_SESSION['formErr'])){ echo !$_SESSION['formErr'] ? 'invisible' : '';}else{echo 'invisible';}  
    ?>" 
    role="alert">
        <?php
        if(isset($_SESSION['formErr'])){
          echo $_SESSION['formErr'];
          unset($_SESSION['formErr']);
        }
        
        ?>
    </div>
    <div class=" position-absolute w-100 alert alert-success <?php if(isset($_SESSION['formValid'])){echo !$_SESSION['formValid'] ? 'invisible' : '';}else{echo 'invisible';} ?>" role="alert">
        <?php
        if(isset($_SESSION['formValid'])){
        echo $_SESSION['formValid'];
        unset($_SESSION['formValid']);
        }
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
              if(isset($_SESSION['username'])){
                echo $_SESSION['username'];
                unset($_SESSION['username']);
              }else{
                echo "";
              }
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
    <button type="submit" class="btn" style="background-color:#7272DB; color:white;">Sign In</button>
  </form>
  <small>Don't you have an account? <a href="<?php echo ROOT_URL?>signup.php">Sign Up</a></small>
</div>




<?php include 'partials/footer.php' //PHP footer CODE ?>