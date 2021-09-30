<?php
$autorisation = 1;
include 'header.php';

?>
<section class="conteneur_col">
  <h3>Dotation</h3>
  <?php
$id = $_GET['id'];
  include 'gestionDB/read/monoUnite.php';
  // data sortie : $dataOneU
  include 'affichages/oneUnite.php';
  $search = $dataOneU[0]['id_faction'];
 $weaponSize = 0;
  include 'affichages/weaponDotation.php';
   ?>
</section>
<?php
  include 'footer.php';
?>
