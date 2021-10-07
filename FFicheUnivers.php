<?php
include 'Fheader.php';
include 'gestionDB/controleFormulaires.php';
$_SESSION['idUniversVisite'] = filter($_GET['idU']);
$_SESSION['nomUnivers'] = filter($_GET['nomU']);
?>
<section>
  <h4>Menu de l'univers  <?php echo $_SESSION['nomUnivers'] ?></h4>
  <ul>
    <li><a class="lienNav" href="FarticleLore.php?idU=<?php echo $_SESSION['idUniversVisite']; ?>">Le lore</a></li>
    <li><a class="lienNav" href="FratelierArme.php?idU=<?php echo $_SESSION['idUniversVisite']; ?>">Les armes</a></li>
    <li><a class="lienNav" href="Funite.php?idU=<?php echo $_SESSION['idUniversVisite']; ?>">Les unités</a></li>
    <li><a class="lienNav" href="Fvehicule.php?idU=<?php echo $_SESSION['idUniversVisite']; ?>">Les véhicules</a></li>
    <li><a class="lienNav" href="Fliste.php?idU=<?php echo $_SESSION['idUniversVisite']; ?>">Les listes</a></li>
  </ul>
</section>
<?php
  include 'footer.php';
?>
