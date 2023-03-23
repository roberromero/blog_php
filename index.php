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
   
   <div class="container" style="width:28rem;">
    <div class="card text-center" >
        <img src="./images/1.jpg" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title" style="color:black;"><?php echo $featuredPost['title']?></h5>
            <p class="card-text" style="color:black;"><?php echo $featuredPost['body']?></p>
            <a href="#" class="btn btn-primary">Category: <?php echo $featuredPost['category_id']?></a>
            <a href="#" class="btn btn-primary">Author: <?php echo $featuredPost['author_id']?></a>
        </div>
      </div>
   </div>
   <!--LOOP posts-->
   <div class="container d-flex mt-3">
      <?php foreach($posts as $post => $value):?>
          <div class="card" style="width: 18rem;" >
            <img src="./images/<?php echo $value['thumbnail'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title" style="color:black;"><?php echo $value['title']?></h5>
                <p class="card-text" style="color:black;"><?php echo $value['body']?></p>
                <a href="#" class="btn btn-primary">Category: <?php echo $value['category_id']?></a>
                <a href="#" class="btn btn-primary">Author: <?php echo $value['author_id']?></a>
            </div>
          </div>
      <?php endforeach;?>
   </div>

</div>


<!--HTML CODE-->
<form action="<?php echo ROOT_URL ?>dashboard/dashboard.php">
    <button  class="btn btn-success">CLICK ME</button>
</form>

<?include 'partials/footer.php' //PHP footer CODE ?>