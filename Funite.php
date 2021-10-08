<?php
include 'Fheader.php';
include 'gestionDB/controleFormulaires.php';
include 'stockage/typeTroupe.php';
$idU = filter($_GET['idU']);
// Tri des factions
$requetteSQL = "SELECT `idFaction`,`nomFaction` FROM `factions` WHERE `idFactionUnivers` = :idU";
$data = $conn->prepare($requetteSQL);
$data->bindParam('idU', $idU);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataFaction = $data->fetchAll();
?>
<section>
  <h4>Les unités trier par faction</h4>
  <article class="conteneur_col">
    <ul class="listBox">
      <?php
      foreach ($dataFaction as $key) {
        echo '<li><h4>'.$key['nomFaction'].'</h4></li>';
        $requetteSQL = "SELECT `idUnite`, `nomFigurine`, `typeTroupe` FROM `unites` WHERE `id_faction` = :idF AND `fixer` = 1";
        $data = $conn->prepare($requetteSQL);
        $data->bindParam(':idF', $key['idFaction']);
        $data->execute();
        $data->setFetchMode(PDO::FETCH_ASSOC);
        $dataUnite = $data->fetchAll();
        if (empty($dataUnite)) {
          echo 'Pas d\'unité dans cette faction';
        }
        echo '<ul>';
        foreach ($dataUnite as $Skey) {
          echo '<li><a class="lienNav" href="FfichesUnite.php?id='.$Skey['idUnite'].'"><i class="far fa-file"></i></a>
          <strong>'.$Skey['nomFigurine'].'</strong> <strong>Type de troupe :</strong> '.$typeTroupe[$Skey['typeTroupe']]['troupe'].'</li>';
        }
        echo '</ul>';
      }
       ?>
    </ul>
  </article>
</section>
<?php
  include 'footer.php';
?>
