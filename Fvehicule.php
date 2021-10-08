<?php
include 'Fheader.php';
include 'gestionDB/controleFormulaires.php';
include 'stockage/typeVehicule.php';
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
      <h4>Les véhicules trié par faction</h4>
  <article class="conteneur_Wrap">
      <ul class="listBox">
        <?php
        foreach ($dataFaction as $key) {
          echo '<li><h4>'.$key['nomFaction'].'</h4></li>';
          $requetteSQL = "SELECT `idVehicule`, `nomVehicule`,`typeVehicule`
          FROM `vehicule`
          WHERE `id_faction` = :idF AND `fixer`= 1 AND `valide` = 1";
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
            echo '<li><a class="lienNav" href="FficheVehicule.php?id='.$Skey['idVehicule'].'"><i class="far fa-file"></i></a>
            <strong>'.$Skey['nomVehicule'].'</strong> <strong>Type de troupe :</strong> '.$typeVehicule[$Skey['typeVehicule']]['type'].'</li>';
          }
          echo '</ul>';
        }
         ?>
      </ul>
  </article>
</section>
<a class="lienNav" href="FFicheUnivers.php?idU=<?php echo $_SESSION['idUniversVisite'] ?>&nomU=<?php echo $_SESSION['nomUnivers']; ?>">
  <i class="fas fa-arrow-left"></i>Retour au menu de l'univers <?php echo $_SESSION['nomUnivers']; ?></a>
<?php
  include 'footer.php';
?>
