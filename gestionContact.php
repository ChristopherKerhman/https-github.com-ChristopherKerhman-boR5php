<?php
$autorisation = 3;
include 'header.php';
?>
<section class="conteneur_col" id="indexBox">
  <h3>Les messages reçus</h3>
  <?php
   include 'gestionDB/read/contact.php';
   include 'affichages/contact.php'
  ?>
</section>
<?php
  include 'footer.php';
?>
