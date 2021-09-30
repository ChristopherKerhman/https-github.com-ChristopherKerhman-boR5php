<?php
//$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col" id="indexBox">
  <?php   if(isset($_GET['message42'])) {echo $_GET['message42'];} ?>
  <h3>Les dernières publication</h3>
  <?php
   include 'formulaires/indexWeapon.php';
  ?>
</section>
<?php
  include 'footer.php';
?>
