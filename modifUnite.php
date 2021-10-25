<?php
$autorisation = 1;
include 'header.php';
include 'gestionDB/read/factions.php';
//$dataFaction
?>
<section class="conteneur_col">
<h3>Modifier l'unité</h3>
  <article class="conteneur_row">
      <i class="fas fa-exclamation-triangle doublesize"></i><p class="paragraphe">La modification des statistique d'une unité entraine la perte de tous son équipement. Vous serez dans l'obligation de le recréer totalement.</p>  <i class="fas fa-exclamation-triangle doublesize"></i>
  </article>
<?php
  $id = $_GET['id'];
  include 'gestionDB/read/monoUnite.php';
  // Donnée de sortie : $dataOneU
  include 'formulaires/modUnite.php';
?>
</section>
<?php
  include 'footer.php';
?>
