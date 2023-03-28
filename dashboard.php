<?php
include_once 'partials/header.php'; //PHP header CODE?
session_start();

?>


<?php if (isset($_SESSION['user-data'])):?>

  <div class="container">
    <div class="container mt-3">
      <div class="list-group" id="manageOptions">
        <a class="list-group-item list-group-item-action active"
           id="manage" 
           aria-current="true" 
           style="cursor:pointer;"
           onclick="changeManage">
          Manage Posts
        </a>
        <a class="list-group-item list-group-item-action" 
           id="create" 
           aria-current="true" 
           style="cursor:pointer;"
           onclick="changeCreate"><!--CLASS "active" needs to be working-->
            Create New Post
        </a>
      </div>
    </div>

    <div class="container mt-3 d-none" id="createTable">
      <?php //Addition needed if() show "add-post.php" if not show "manage-posts.php"
        include_once './add-post.php';
        ?>
    </div>
    <div class="container mt-5" id="manageTable">
      <?php 
      include_once './manage-post.php';
      ?>
    </div>
      
  </div>
 



<?php endif;?>

<?php include 'partials/footer.php' //PHP footer CODE ?>

<script>
  //To handle active class for create and Manage Post
  const create = document.getElementById("create");
  const manage = document.getElementById("manage");

  const createTable = document.getElementById("createTable");
  const manageTable = document.getElementById("manageTable");

  create.addEventListener("click", changeCreate);
  manage.addEventListener("click", changeManage);

  function changeManage(){
    manage.classList.add("active");
    manageTable.classList.remove("d-none");
    create.classList.remove("active");
    createTable.classList.add("d-none");
  
  }
  function changeCreate(){
    create.classList.add("active");
    createTable.classList.remove("d-none");
    manage.classList.remove("active");
    manageTable.classList.add("d-none");

  }
 


</script>