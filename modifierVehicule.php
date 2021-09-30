<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col">
<h3>Modifier un véhicule</h3>
  <article class="conteneur_row">
      <i class="fas fa-exclamation-triangle doublesize"></i><p class="paragraphe">La modification des statistique d'un véhicule entraine la perte de tous son équipement. Vous serez dans l'obligation de le recréer totalement.</p>  <i class="fas fa-exclamation-triangle doublesize"></i>
  </article>
<?php
  $id = $_GET['id'];

 include 'gestionDB/read/monoVehicule.php';
  // Donnée de sortie :   $dataOneV
  // A modifier
 include 'formulaires/modVehicule.php';
?>
</section>
<?php
  include 'footer.php';
?>
