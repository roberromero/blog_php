<?php
session_start();
echo '<pre>';
var_dump($_SESSION);
echo '</pre>';

if (isset($_SESSION['user-data'])):
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
    <!--LOOP PARA VOLCAR POSTS-->
    <tr>
      <td>Titulo post</td>
      <td>Categoria post</td>
      <td><button type="button" class="btn btn-primary">Edit</button></td>
      <td><button type="button" class="btn btn-danger">Delete</button></td>
    </tr>
  </tbody>
</table>

<?php endif;?>