<?php
include_once 'partials/header.php'; //PHP header CODE?
session_start();

?>


<?php if (isset($_SESSION['user-data'])):?>

  <div class="container">
    <div class="container mt-3">
      <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action"><!--CLASS "active" needs to be working-->
            Create New Post
        </a>
        <a href="#" class="list-group-item list-group-item-action">Manage Posts</a>
      </div>
    </div>

    
      <?php //Addition needed if() show "add-post.php" if not show "manage-posts.php"
      include_once './add-post.php';
      ?>
      <?php 
      include_once './manage-post.php';
      ?>
  </div>
  



<?php endif;?>

<?php include 'partials/footer.php' //PHP footer CODE ?>