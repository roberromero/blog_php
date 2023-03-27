<?php 
session_start();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
?>
<div class="position-relative pb-5">
  <div class="position-absolute w-100 alert alert-danger <?php echo !$_SESSION['addFormErr'] ? 'invisible' : '' ?>" role="alert"> 
    <?php echo $_SESSION['addFormErr'] ?>
  </div>
  <div class="position-absolute w-100 alert alert-success <?php echo !$_SESSION['postSuccess'] ? 'invisible' : '' ?>" id="postAddedAlert" role="alert">
  <?php echo $_SESSION['postSuccess'];
        unset($_SESSION['postSuccess']);
  ?>
  </div>
</div>
<div class="container w-50">
  <form action="add-post-logic.php" 
        method="post" 
        enctype="multipart/form-data" 
        class="pb-3" 
        id="postForm" 
        novalidate> <!--Adding due to the input file-->
    <div class="mb-3 pt-4">
      <input type="text"
            class="form-control"
            id="exampleFormControlInput1" 
            name="title" 
            value="<?php echo $_SESSION['form-data']['title']?>"
            placeholder="Introduce your first name">
    </div>
    <div class="mb-3">
      <textarea class="form-control"
                name="body" 
                rows="3"><?php echo $_SESSION['form-data']['body']?></textarea>
    </div>
    <select class="form-select mb-3"
            aria-label="Default select example"
            name="category_id">
      <option selected value="0">Open this select menu</option>
      <option value="1">One</option>
      <option value="2">Two</option>
      <option value="3">Three</option>
    </select>
    <div class="mb-3">
      <input class="form-control"
             type="file" 
             name="thumbnail"
             id="formFile">
    </div>
    <button type="submit" class="btn btn-success">Add New Post</button>
  </form>
</div>
<!-- <script>
  const postForm = document.getElementById("postForm");
  function saludo(e){
    const postAddedAlert = document.getElementsById("postAddedAlert").classList;
    postAddedAlert.add("invisible");
  }
  postForm.addEventListener("click", saludo);
</script> -->