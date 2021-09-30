<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col">
  <h3>Gestion des armes.</h3>
<?php
$lock = 0;
include 'formulaires/searchUnivers.php';
// Donnée :   $dataWeapon
include 'affichages/armes.php';
?>
</section>
<?php
  include 'footer.php';
?>
