<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col">
  <h3>Ajouter des règles spéciales</h3>
<?php
  if (!empty($_GET['idArme'])) {
    $idArme = $_GET['idArme'];
    include 'affichages/weapon.php';
    include 'formulaires/RS.php';

  }
?>
</section>
<?php
  include 'footer.php';
?>
