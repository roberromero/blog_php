<?php
include_once 'partials/header.php'; //PHP header CODE
//to get posts not featured
$posts = getPosts("0"); 
//to get featured post
$featuredPost = getPosts("1");
?>
<style>
  .img-normalize{
    height: 18em;     
    object-fit: cover;
    }
    .text-blog-hidden {
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


<div class="container text-center">
  <!--MAIN post-->
  
   <h1 class="m-5 title">HOME PAGE</h1> 
   <!--LOOP featured post-->
   
   <div class="container" style="max-width:48rem;">
    <div class="card text-center" >
      <div>
        <img src="./images/<?php echo $featuredPost['thumbnail'] ?>" class="card-img-top" style="height: 28em; object-fit:cover;" alt="...">
      </div>
      <div class="card-body osw-content">
          <h5 class="card-title" style="color:black; height: 4rem;"><?php echo $featuredPost['title']?></h5>
          <p class="card-text text-blog-hidden" style="color:black; margin: 25px 0 15px 0;"><?php echo $featuredPost['body']?></p>
          <a href="#" class="btn" style="border:2px solid; color:black;"><?php echo implode(getNameCategoryFromId($featuredPost['category_id']))?></a>

          <div class="blog-info">
            <img src="./images/<?php echo implode(getAvatarFromId($featuredPost['author_id']))?>" 
                  alt="author photo" 
                  class="avatar" 
              >
              <div class="blog-info__int osw-details">
              <a href="#" class="btn ">By:
                <?php $arrayFe = getNameUserFromId($featuredPost['author_id']);
                echo $arrayFe['firstname'] . ' ' . $arrayFe['lastname']?>
              </a>
              <p style="color:black;"><?php echo $featuredPost['date_time'] ?></p>
            </div>
            <a class="btn btn-bd-primary" href="post-details.php?id=<?php echo $featuredPost['id']?>">more</a>
          </div>
      </div>
    </div>
   </div>
   <!--LOOP posts-->
   <div class="pad-0 container text-center p-5 ">
   <div class="row">
      <?php foreach($posts as $post => $value):?>
  
      <div class="col-lg-6 pb-3">
        <div class="card text-center">
          <div>
            <img src="./images/<?php echo $value['thumbnail'] ?>" class="card-img-top img-normalize" alt="...">
          </div> 
          <div class="card-body osw-content">
            <h5 class="card-title" style="color:black; height: 4rem;"><?php echo $value['title']?></h5>
            <p class="card-text text-blog-hidden" style="color:black; margin: 25px 0 15px 0;"><?php echo $value['body']?></p>
            <a href="#" class="btn" style="border:2px solid; color:black;">
              <?php 
                echo implode(getNameCategoryFromId($value['category_id'])); // "implodes" converts associative array in string
              ?>
            </a>
            <div class="blog-info">
              <img class="avatar" src="./images/<?php 
                      $avatar = getAvatarFromId($value['author_id']);
                      echo implode($avatar) ?>" 
                  alt="user photo">
              <div class="blog-info__int osw-details">
                <p style="color:black;">By:
                  <?php
                  $array = getNameUserFromId($value['author_id']); 
                  echo $array['firstname'] . ' ' . $array['lastname'];
                  ?>
                </p>
                <p style="color:black;"><?php echo $value['date_time'] ?></p>
              </div>
              <a class="btn btn-bd-primary" href="post-details.php?id=<?php echo $value['id']?>">more</a>
          </div>
          </div>
        </div>
      </div>

      <?php endforeach;?>
    </div>
   </div>
<!--////////////////////////////////////////////////////////////-->
</div>
<?php 
$categories = getCategoriesData();
foreach($categories as $category => $v):?>
  <a href="#" class="btn-blog btn"><?php echo $v['title']?></a>
<?php endforeach;?>

<?include 'partials/footer.php' //PHP footer CODE ?>