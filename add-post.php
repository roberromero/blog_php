<?php 
include_once 'partials/header.php'; //PHP header CODE?
// session_start();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';
$categoriesData = getCategoriesData();//to get categories
?>


<?php if (isset($_SESSION['user-data'])):?>
<!--list to navegate dashboard -->
  <div class="container">
    <div class="container mt-3">
      <div class="list-group" id="manageOptions">
        <a  class="list-group-item list-group-item-action"
            id="manage" 
            aria-current="true" 
            style="cursor:pointer;" 
            href="<?php echo ROOT_URL ?>manage-post.php ">
            Manage Posts
          </a>
        <a  class="list-group-item list-group-item-action active" 
            id="create" 
            aria-current="true" 
            style="cursor:pointer;" 
            >
              Create New Post
        </a>  
      </div>
    </div>
<div class="container mt-3" id="createTable">
  <div class="position-relative pb-5">
    <div class="position-absolute w-100 alert alert-danger <?php echo !isset($_SESSION['addFormErr']) ? 'invisible' : '' ?>" role="alert"> 
      <?php if(isset($_SESSION['addFormErr'])){
            echo $_SESSION['addFormErr'];
            unset($_SESSION['addFormErr']);
      }
      ?>
    </div>
    <div class="position-absolute w-100 alert alert-success <?php echo !isset($_SESSION['postSuccess']) ? 'invisible' : '' ?>" id="postAddedAlert" role="alert">
    <?php if(isset($_SESSION['postSuccess'])){
      echo $_SESSION['postSuccess'];
      unset($_SESSION['postSuccess']);
    }
    ?>
    </div>
  </div>
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
              value="<?php if(isset($_SESSION['form-data']['title'])){echo $_SESSION['form-data']['title'];}?>"
              placeholder="Introduce your first name">
      </div>
      <div class="mb-3">
        <textarea class="form-control"
                  name="body" 
                  rows="3"><?php if(isset($_SESSION['form-data']['body'])) echo $_SESSION['form-data']['body']?></textarea>
      </div>
      <select class="form-select mb-3"
              aria-label="Default select example"
              name="category_id">
        <option selected value="0">Open this select menu</option>
        <?php foreach($categoriesData as $category => $value):?>
          <option value="<?php echo $value['id']?>"><?php echo $value['title']?></option>
        <?php endforeach; ?>
      </select>
      <div class="mb-3">
        <input class="form-control"
              type="file" 
              name="thumbnail"
              id="formFile">
      </div>
      <button type="submit" class="btn-blog btn-outline-light btn">Add New Post</button>
  </form>
</div>
  <?php endif;?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>