<?php
include_once 'partials/header.php'; //PHP header CODE
//to get posts not featured
$posts = getPosts("0"); 
//to get featured post
$featuredPost = getPosts("1");

?>



<div class="container text-center">
  <!--MAIN post-->
  
   <h1 class="m-5">HOME PAGE</h1> 
   <!--LOOP featured post-->
   
   <div class="container" style="max-width:48rem;">
    <div class="card text-center" >
      <div>
        <img src="./images/<?php echo $featuredPost['thumbnail'] ?>" class="card-img-top" style="height: 28em; object-fit:cover;" alt="...">
      </div>
      <div class="card-body">
          <h5 class="card-title" style="color:black;"><?php echo $featuredPost['title']?></h5>
          <p class="card-text" style="color:black;"><?php echo $featuredPost['body']?></p>
          <a href="#" class="btn btn-primary">Category: <?php echo $featuredPost['category_id']?></a>
          <a href="#" class="btn btn-primary">Author: <?php echo $featuredPost['author_id']?></a>
          <a class="btn btn-primary" href="post-details.php?id=<?php echo $featuredPost['id']?>">Read more</a>
      </div>
    </div>
   </div>
   <!--LOOP posts-->
   <div class="pad-0 container text-center p-5 ">
   <div class="row">
      <?php foreach($posts as $post => $value):?>
  
      <div class="col-md-6 pb-3">
        <div class="card text-center">
          <div>
            <img src="./images/<?php echo $value['thumbnail'] ?>" class="card-img-top img-normalize" alt="...">
          </div> 
          <div class="card-body">
            <h5 class="card-title" style="color:black;"><?php echo $value['title']?></h5>
            <p class="card-text" style="color:black;"><?php echo $value['body']?></p>
            <a href="#" class="btn btn-primary">Category: <?php echo $value['category_id']?></a>
            <a href="#" class="btn btn-primary">Author: <?php echo $value['author_id']?></a>
            <a class="btn btn-primary" href="post-details.php?id=<?php echo $value['id']?>">Read more</a>
          </div>
        </div>
      </div>

      <?php endforeach;?>
    </div>
   </div>
<!--////////////////////////////////////////////////////////////-->
</div>
<style>
    .img-normalize{
    height: 18em;     
    object-fit: cover;
    }
    .card-body p {
    max-width: 100%;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    height: 2.7rem;
    margin: 0 auto;
    line-height: 1;
 }
 @media only screen and (max-width: 768px) {
  .pad-0 {
     padding: 5rem 12px !important;
  }
}
</style>

<?include 'partials/footer.php' //PHP footer CODE ?>