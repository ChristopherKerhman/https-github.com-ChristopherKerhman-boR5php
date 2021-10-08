<?php
include 'Fheader.php';
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
  <a class="lienNav" href="Fvehicule.php?idU=<?php echo $_SESSION['idUniversVisite']; ?>" ><i class="fas fa-arrow-left"></i>Retour</a><br />
<a class="lienNav" href="FFicheUnivers.php?idU=<?php echo $_SESSION['idUniversVisite'] ?>&nomU=<?php echo $_SESSION['nomUnivers']; ?>">
  <i class="fas fa-arrow-left"></i>Retour au menu de l'univers <?php echo $_SESSION['nomUnivers']; ?></a>
<?php
  include 'footer.php';
?>
