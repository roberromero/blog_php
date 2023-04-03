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
  <div class="card-body osw-content">
    <h5 class="card-title" style="color:black;"><?php echo $post['title']?></h5>
    <p class="card-text m-5" style="color:black;"><?php echo $post['body']?></p>
    <div class="d-flex osw-details" style="height: 4rem;">
      <img class="rounded-circle" 
          src="./images/<?php 
            echo implode(getAvatarFromId($post['author_id'])) ?>" 
          alt="user photo"
      >
     <div class="post-details">
      <a href="#" class="btn">
          <?php $author = getNameUserFromId($post['author_id']);
          echo $author['firstname'] . ' ' . $author['lastname'];
          ?>
        </a>
        <p><?php echo $post['date_time']?></p>
     </div>
      <a href="#" class="btn post-details__category-btn">
        <?php echo implode(getNameCategoryFromId($post['category_id']))?>
      </a>
   
    </div>
  </div>
  </div>
</div>
<a href="./" class="btn btn-bd-primary m-4" style="float:right; background-color:#7272DB;">Back</a>

<?include 'partials/footer.php' //PHP footer CODE ?>
