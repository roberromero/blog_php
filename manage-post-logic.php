<?php 
include_once 'partials/header.php'; //PHP header CODE?
require_once './config/database.php';

$id = $_GET['id'];
$post = getSpecificPostById($id);
$categoriesData = getCategoriesData();//to get categories

if($_GET['actionPost'] === "edit") {?>
    <!--EDIT HTML SECTION  -->  
    <div class="container mt-5">
        <div class="position-relative pb-5">
            <div class="position-absolute w-100 alert alert-danger <?php echo !$_SESSION['addFormErr'] ? 'invisible' : '' ?>" role="alert"> 
            <?php echo $_SESSION['addFormErr'];
                    unset($_SESSION['addFormErr']);
            ?>
            </div>
            <div class="position-absolute w-100 alert alert-success <?php echo !$_SESSION['postSuccess'] ? 'invisible' : '' ?>" id="postAddedAlert" role="alert">
            <?php echo $_SESSION['postSuccess'];
                unset($_SESSION['postSuccess']);
            ?>
            </div>
        </div>
      <form action="manage-post-logic-edit.php" 
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
                  value="<?php echo $post['title']?>"
                  placeholder="Introduce your first name">
          </div>
          <div class="mb-3">
            <textarea class="form-control"
                      name="body" 
                      rows="3"><?php echo $post['body']?></textarea>
          </div>
          <select class="form-select mb-3"
                  aria-label="Default select example"
                  name="category_id">
            <!-- <option <?php //?> value="2">Two</option> -->
            <?php foreach($categoriesData as $category => $value):?>
            <option value="<?php echo $value['id']?>" <?php ($_POST['category_id'] == $value['id'] ? 'selected' : '')?> >
              <?php echo $value['title']?> 
            </option>
            <?php endforeach; ?>
          </select>
          <div class="mb-3">
            <input class="form-control"
                  type="file" 
                  name="thumbnail"
                  id="formFile">
          </div>
          <div class="mb-3">
            <input type="hidden"
                    class="form-control"
                    id="exampleFormControlInput7" 
                    name="id"
                    value="<?php echo $id?>"
                    >
           </div>
           <div class="mb-3">
            <input type="hidden"
                    class="form-control"
                    id="exampleFormControlInput7" 
                    name="oldThumbnail"
                    value="<?php echo $post['thumbnail']?>"
                    >
           </div>
          <div class="w-100">
            <button type="submit" class="btn-blog btn">Modify Post</button>
            <a class="btn-blog btn" href="./manage-post.php" role="button" style="float: right;">Back</a>
          </div>
      </form>
      
    </div>    
  <?php }elseif($_GET['actionPost'] === "delete"){
    $filename = $post['thumbnail'];
    deletePost($id,$filename);
    header('Location:' . getenv('HTTP_REFERER'));
    die();
  } ?> 
<?php 
include 'partials/footer.php'; //PHP footer CODE
?>