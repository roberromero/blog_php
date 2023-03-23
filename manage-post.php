<?php
session_start();
if (isset($_SESSION['user-data'])):
?>
<p>
    <?php echo "estamos dentro" ?>
</p>

<?php endif;?>