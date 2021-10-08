<?php
include 'Fheader.php';
?>
<section class="conteneur_col" id="indexBox">
  <?php
  include 'gestionDB/controleFormulaires.php';
  $id = filter($_GET['id']);
  include 'gestionDB/read/monoUnite.php';
  include 'affichages/oneUniteFiche.php';
  ?>

</section>
  <a class="lienNav" href="Funite.php?idU=<?php echo $_SESSION['idUniversVisite']; ?>" ><i class="fas fa-arrow-left"></i>Retour</a><br />
<a class="lienNav" href="FFicheUnivers.php?idU=<?php echo $_SESSION['idUniversVisite'] ?>&nomU=<?php echo $_SESSION['nomUnivers']; ?>">
  <i class="fas fa-arrow-left"></i>Retour au menu de l'univers <?php echo $_SESSION['nomUnivers']; ?></a>
<?php
  include 'footer.php';
?>
