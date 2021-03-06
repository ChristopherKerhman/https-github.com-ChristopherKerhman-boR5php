<?php
$autorisation = 1;
include 'header.php';
include 'stockage/typeTroupe.php';
include 'stockage/de.php';
include 'stockage/sauvegarde.php';
include 'stockage/pointDeVie.php';
include 'stockage/yes.php';
include 'stockage/typeVehicule.php';
?>
<section class="conteneur_col">
  <article>
    <?php   if(isset($_GET['id'])) {
    include 'gestionDB/controleFormulaires.php';
    $idListe = filter($_GET['id']);
    $requetteSQL = "SELECT `idListeArmee`, `nomUnivers`, `nomFaction`, `nomListe`, `valeurListe`, `id_faction`
    FROM `listeArmee`
    INNER JOIN `multivers` ON `listeArmee`.`id_univers` = `multivers`.`idUnivers`
    INNER JOIN `factions` ON `listeArmee`.`id_faction` = `factions`.`idFaction`
    WHERE `idListeArmee` = :id";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $idListe);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataListe = $data->fetchAll();
  }
  ?>
  </a>
  <h3>Nom de la liste : <?php echo '<a class="lienNav" href="publication.php?idListe='.$dataListe[0]['idListeArmee'].'"><i class="far fa-file"></i> &nbsp;'.$dataListe[0]['nomListe'].'</a>'; ?></h3>

  <?php if(isset($_GET['message44'])) {echo $_GET['message44'];} ?>
  <ul class="listBox">
    <li>Univers : <?php echo $dataListe[0]['nomUnivers']; ?></li>
    <li>Nom faction : <?php echo $dataListe[0]['nomFaction']; ?></li>
    <li>Valeur : <?php
    $requetteSQL = "SELECT SUM(`TotalValeur`) AS `somme` FROM `doterListeArmee` WHERE `idListe` = :id";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $idListe);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $total = $data->fetchAll();
   $total = $total[0]['somme']; echo round($total, 0); ?> points</li>
  </ul>
  </article>
<?php // Affichage de la composition de la liste.
 include 'affichages/compositionListe.php';
?>
<div class="conteneur_row">
<?php // Ajout d'élément dans la liste (unités et véhicules)
include 'formulaires/dotationListe.php';
?>
</div>
</section>
<?php include 'footer.php'; ?>
