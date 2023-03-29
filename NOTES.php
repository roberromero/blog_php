<div class="d-flex flex-wrap mt-3">
      <?php foreach($posts as $post => $value):?>
          <div class="card" style="width: 18rem;" >
            <div>
              <img src="./images/<?php echo $value['thumbnail'] ?>" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
                <h5 class="card-title" style="color:black;"><?php echo $value['title']?></h5>
                <p class="card-text" style="color:black;"><?php echo $value['body']?></p>
                <a href="#" class="btn btn-primary">Category: <?php echo $value['category_id']?></a>
                <a href="#" class="btn btn-primary">Author: <?php echo $value['author_id']?></a>
            </div>
          </div>
      <?php endforeach;?>
   </div>