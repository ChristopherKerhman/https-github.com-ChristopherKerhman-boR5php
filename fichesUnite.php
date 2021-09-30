<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col" id="indexBox">

  <h3>Les dernières publication</h3>
  <?php
  include 'gestionDB/controleFormulaires.php';
  $id = filter($_GET['id']);
  include 'gestionDB/read/monoUnite.php';
  //   $dataOneU
  print_r($dataOneU);
  ?>
</section>
<?php
  include 'footer.php';
?>
