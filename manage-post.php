<?php
include_once 'partials/header.php'; //PHP header CODE?
// require './config/constants.php';
// session_start();
$categoriesData = getCategoriesData();//to get categories
?>


<?php if (isset($_SESSION['user-data'])):?>

    <div class="container mt-3">
      <div class="list-group" id="manageOptions">
        <a  class="list-group-item list-group-item-action active"
            id="manage" 
            aria-current="true" 
            style="cursor:pointer;">
            Manage Posts
          </a>
        <a  class="list-group-item list-group-item-action" 
            id="create" 
            aria-current="true" 
            style="cursor:pointer;" 
            href="<?php echo ROOT_URL ?>add-post.php ">
              Create New Post
        </a>  
      </div>
    </div>
<?php $posts = getPostsByAuthor($_SESSION['user-data']['id']); ?>
  <div class="container mt-5" id="manageTable">
    <table class="table" style="color:white;">
      <thead>
        <tr>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Edit</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <!--CHECK IF THERE ARE ANY POSTS-->
        <?php if(empty($posts)){ ?>
          <div class="alert alert-danger" role="alert">
            You have no posts published!
          </div>
        <?php }else {
          foreach($posts as $post => $value):?><!--LOOP TO SHOW POSTS-->
            <tr>
              <td><?php echo $value['title']?></td>
              <td>
                <?php 
                foreach($categoriesData as $category => $val):
                  if($val['id'] == $value['category_id']){
                    echo $val['title'];
                  }
                endforeach;
                ?>
              </td>
              <!--SENDING ID THROUGH BROWSER "href" ($_GET METHOD)-->
              <td><a class="btn-blog btn-outline-light btn" href="manage-post-logic.php?actionPost=edit&id=<?php echo $value['id']?>">Edit</a></td>
              <td><a class="btn btn-danger" href="manage-post-logic.php?actionPost=delete&id=<?php echo $value['id']?>">Delete</a></td>
            </tr>
        <?php endforeach;} ?> 
      </tbody>
    </table>
  <?php endif;?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>