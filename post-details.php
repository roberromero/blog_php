<?php 
include_once 'partials/header.php'; //PHP header CODE
require_once './config/database.php';
$post = getSpecificPostById($_GET['id']);

?>
<div class="container pt-3" style="max-width: 50rem;">
  <div class="card text-center">
  <div>
    <img src="./images/<?php echo $post['thumbnail'] ?>" class="card-img-top img-normalize" alt="...">
  </div> 
  <div class="card-body">
    <h5 class="card-title" style="color:black;"><?php echo $post['title']?></h5>
    <p class="card-text" style="color:black;"><?php echo $post['body']?></p>
    <a href="#" class="btn btn-primary">Category: <?php echo $post['category_id']?></a>
    <a href="#" class="btn btn-primary">Author: <?php echo $post['author_id']?></a>
  </div>
  </div>
</div>
<a href="./" class="btn btn-primary m-4" style="float:right;">Back</a>

<?include 'partials/footer.php' //PHP footer CODE ?>