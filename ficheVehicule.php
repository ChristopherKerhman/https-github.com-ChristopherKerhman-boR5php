<?php
$autorisation = 1;
include 'header.php';

?>
<section class="conteneur_col">
  <h3>Dotation</h3>
  <?php
$id = $_GET['id'];
  include 'gestionDB/read/monoVehicule.php';
  // data sortie : $dataOneU
  include 'affichages/oneVehiculeFiche.php';
// On va trier les arme pour les véhicules
// Déclaration de variable de bascule unité / véhicule pour le tri des armes

   ?>
</section>
<?php
  include 'footer.php';
?>
