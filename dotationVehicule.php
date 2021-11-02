<?php
$autorisation = 1;
include 'header.php';

?>
<section class="conteneur_col">
  <h3>Dotation</h3>
  <?php
$id = $_GET['id'];
  include 'gestionDB/read/monoVehicule.php';
  // data sortie : $dataOneV
  include 'affichages/oneVehicule.php';
  $search = $dataOneV[0]['id_faction'];
// On va trier les arme pour les véhicules
// Déclaration de variable de bascule unité / véhicule pour le tri des armes
$weaponSize = 1;
//  include 'affichages/weaponEnDotation.php';
  include 'affichages/weaponDotation.php';

   ?>
</section>
<?php
  include 'footer.php';
?>
