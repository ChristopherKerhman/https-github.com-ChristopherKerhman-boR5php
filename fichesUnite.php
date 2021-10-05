<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col" id="indexBox">
  <?php
  include 'gestionDB/controleFormulaires.php';
  $id = filter($_GET['id']);
  include 'gestionDB/read/monoUnite.php';
  include 'affichages/oneUniteFiche.php';
  ?>

</section>
<?php
  include 'footer.php';
?>
