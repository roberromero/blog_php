<?php 

require_once './config/database.php';

$name= getNameCategoryFromId(2);
echo '<pre>';
var_dump($name);
echo '</pre>';

?>