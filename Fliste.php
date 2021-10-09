<?php
include 'Fheader.php';
$requetteSQL = "SELECT `idListeArmee`, `nomListe`, `valeurListe`, `nomFaction`
FROM `listeArmee`
iNNER JOIN `factions` ON `id_faction` = `idFaction`
WHERE `valide` = 1 AND `fixerListe` = 1 AND `id_univers` = :id
ORDER BY `nomListe` ASC";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $_SESSION['idUniversVisite']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataListe = $data->fetchAll();
?>
<section>
  <h4>Les listes partagé pour l'univers <?php echo $_SESSION['nomUnivers']; ?></h4>
  <article class="conteneur_Wrap">
<ul>
  <?php
  if (empty($dataListe)) {
    echo 'Pas encore de liste dans cette univers.';
  }
    foreach ($dataListe as $key) {
      echo '<li><a class="lienNav" href="Fpublication.php?idListe='.$key['idListeArmee'].'"><i class="far fa-file"></i></a> <strong>Liste :</strong> '.$key['nomListe'].'
      <strong>Faction : </strong> '.$key['nomFaction'].' <strong>Valeur liste :</strong> '.$key['valeurListe'].'</li>';
    }
  ?>
  </ul>
  </article>
</section>
<?php
  include 'footer.php';
?>
