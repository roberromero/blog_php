<?php
session_start();
// echo '<pre>';
// var_dump($_SESSION);
// echo '</pre>';

if (isset($_SESSION['user-data'])):
$posts = getPostsByAuthor($_SESSION['user-data']['id']);
?>
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
            <td><?php echo $value['category_id']?></td>
            <!--SENDING ID THROUGH BROWSER "href" ($_GET METHOD)-->
            <td><a class="btn btn-primary" href="manage-post-logic.php?actionPost=edit&id=<?php echo $value['id']?>">Edit</a></td>
            <td><a class="btn btn-danger" href="manage-post-logic.php?actionPost=delete&id=<?php echo $value['id']?>">Delete</a></td>
          </tr>
      <?php endforeach;} ?> 
    </tbody>
  </table>
    <?php endif;?>