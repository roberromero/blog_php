<?php 
session_start();

?>
<p>
<?php echo '<pre>'?>
  <?php var_dump($_SESSION);?>
<?php echo '</pre>' ?>
</p>
<div class="container w-50">
  <form action="add-post-logic.php" 
        method="post" 
        enctype="multipart/form-data" 
        class="pb-3" 
        novalidate> <!--Adding due to the input file-->
    <div class="mb-3 pt-4">
      <input type="text"
            class="form-control"
            id="exampleFormControlInput1" 
            name="title" 
            placeholder="Introduce your first name">
    </div>
    <div class="mb-3">
      <textarea class="form-control"
                name="body"
                rows="3"></textarea>
    </div>
    <select class="form-select mb-3"
            aria-label="Default select example"
            name="category_id">
      <option selected>Open this select menu</option>
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
