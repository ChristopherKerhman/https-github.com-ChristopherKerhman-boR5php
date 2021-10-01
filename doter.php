<?php
$autorisation = 1;
include 'header.php';
include 'stockage/typeTroupe.php';
include 'stockage/de.php';
include 'stockage/sauvegarde.php';
include 'stockage/pointDeVie.php';
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
  <h3>Nom de la liste : <?php echo $dataListe[0]['nomListe']; ?></h3>
  <?php if(isset($_GET['message44'])) {echo $_GET['message44'];} ?>
  <ul class="listBox">
    <li>Univers : <?php echo $dataListe[0]['nomUnivers']; ?></li>
    <li>Nom faction : <?php echo $dataListe[0]['nomFaction']; ?></li>
    <li>Valeur : <?php $valeurListe = $dataListe[0]['valeurListe']; echo $valeurListe; ?> points</li>
  </ul>
  </article>
  <article>
  <h3>Dotation Unité</h3>
  <?php
  $idFaction = $dataListe[0]['id_faction'];
  $requetteSQL = "SELECT `idUnite`, `nomFigurine`, `typeTroupe`, `DQM`, `DC`, `sauvegarde`, `pointDeVie`, `valeurUnite`
  FROM `unites`
  WHERE `fixer` = 1 AND `id_faction` = :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $idFaction);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataUnite = $data->fetchAll();
  //print_r($dataUnite);
?>
<h4>Les unités disponibles</h4>
<?php
  foreach ($dataUnite as $key) {
    echo  '<ul class="listBox">
    <li><strong>Nom unite :</strong> '.$key['nomFigurine'].' <strong>Valeur :</strong> '.$key['valeurUnite'].' points</li>
    <li><strong>DQM :</strong> '.$typeDe[$key['DQM']]['de'].' <strong>DC :</strong> '.$typeDe[$key['DC']]['de'].'</li>
    <li><strong>Armure :</strong> '.$sauvegarde[$key['sauvegarde']]['message'].' - '.$sauvegarde[$key['sauvegarde']]['Type'].'</li>
    <li><strong>Point de vie :</strong> '.$pdv[$key['pointDeVie']]['pdv'].'</li>
    <li><a class="lienNav" href="fichesUnite.php?id='.$key['idUnite'].'">Voir fiche '.$key['nomFigurine'].'</a></li>
    <li>
    <form action="gestionDB/record/addList.php" method="post">
      <input type="hidden" name="idListe" value="'.$dataListe[0]['idListeArmee'].'">
      <input type="hidden" name="id_Unite" value="'.$key['idUnite'].'">
      <input type="hidden" name="valeur" value="'.$key['valeurUnite'].'">
      <input type="hidden" name="typeElement" value="1" />
      <div class="conteneur_row">
      <label for="numbre">Nombre de figurine</label>
      <input id="number" class="sizeInpute" type="number" name="nbr" min="1" max="24">
      <button class="buttonGestionLore " type="submit" name="button">Ajouter</button>
      </div>
    </form>
    </li>
    </ul>';
  }
  // Créer le ficher AddList.php
?>
</article>
</section>
<?php
  include 'footer.php';
?>
