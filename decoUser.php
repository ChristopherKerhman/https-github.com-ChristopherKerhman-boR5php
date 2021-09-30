<?php
$autorisation = 1;
include 'header.php';
?>
<section>
  <?php session_destroy();
  header('location:index.php');
   ?>
</section>
<?php
  include 'footer.php';
?>
