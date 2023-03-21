<?php

require 'config/database.php'; //FUNCTIONS TO ACCESS DATABASE

$res = checkUsernameEmail("robertoomero", "ohn@gmail.com");
if($res){
    echo "existen en la BBDD";
}else{
    echo "NO existen en la BBDD";
}
?>

<?php include 'partials/header.php' //PHP header CODE?>
<?php include 'partials/navbar.php' //PHP navbar CODE?>


<!--HTML CODE-->


<?include 'partials/footer.php' //PHP footer CODE ?>