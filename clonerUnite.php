<?php
$autorisation = 1;
include 'header.php';
include 'gestionDB/read/factions.php';
//$dataFaction
?>
<section class="conteneur_col">
<?php
  $id = $_GET['id'];
  include 'gestionDB/read/monoUnite.php';
  // Donnée de sortie : $dataOneU
include 'stockage/typeTroupe.php';
  include 'stockage/de.php';
  include 'stockage/yes.php';
  include 'stockage/gabarit.php';
  include 'stockage/sauvegarde.php';
  include 'stockage/pointDeVie.php';
  if (!empty($dataOneU)) {
  echo '<div class="boxePresentation">
  <h3>Cloner l\'unité  '.$dataOneU[0]['nomFigurine'].'</h3>
  <ul class="listeVehicule">
  <li><strong>Faction de l\'unité:</strong> '.$dataOneU[0]['nomFaction'].'</li>';
  echo '
  <li><strong>Type de troupe: </strong>'.$typeTroupe[$dataOneU[0]['typeTroupe']]['troupe'];
  if ($dataOneU[0]['niveauMage'] > 0) {
  echo ' <strong>Niveau Mage:</strong>'.$dataOneU[0]['niveauMage'].'</li>';
  } else {
    echo '</li>';
  }
  echo '<li><strong>DQM:</strong> '.$typeDe[$dataOneU[0]['DQM']]['de'].' <strong>DC:</strong> '.$typeDe[$dataOneU[0]['DC']]['de'].'</li>
  <li><strong>Type de protection:</strong> '.$sauvegarde[$dataOneU[0]['sauvegarde']]['message'].'</li>
  <li><strong>Point de vie:</strong>'.$pdv[$dataOneU[0]['pointDeVie']]['pdv'].' Point de vie <strong>Sauvegarde:</strong>'.$sauvegarde[$dataOneU[0]['sauvegarde']]['Type'].'</li>
  <li><strong>Valeur:</strong> '.$dataOneU[0]['valeurUnite'].'</li>
  </ul>
  <p class="paragrapheVehicule"><strong>Description :</strong><br />'.$dataOneU[0]['Description'].'</p>';
  //print_r($dataOneU);
}
  else {
    echo 'Pas de données.';
  } ?>

  <form action="gestionDB/record/addUnite.php" method="post">
    <label for="nom">Changer le nom de l'unité à cloner ?</label>
    <input class="sizeInpute" type="text" name="nomFigurine" placeholder="<?php echo $dataOneU[0]['nomFigurine']; ?>">
    <input type="hidden" name="Description" value="<?php echo $dataOneU[0]['Description']; ?>" required>
    <input type="hidden" name="id_faction" value="<?php echo $dataOneU[0]['id_faction']; ?>">
    <input type="hidden" name="idP" value="<?php echo $dataOneU[0]['idP']; ?>">
    <input type="hidden" name="DC" value="<?php echo $dataOneU[0]['DC']; ?>">
    <input type="hidden" name="DQM" value="<?php echo $dataOneU[0]['DQM']; ?>">
    <input type="hidden" name="typeTroupe" value="<?php echo $dataOneU[0]['typeTroupe']; ?>">
    <input type="hidden" name="taille" value="<?php echo $dataOneU[0]['taille']; ?>">
    <input type="hidden" name="deplacement" value="<?php echo $dataOneU[0]['deplacement']; ?>">
    <input type="hidden" name="course" value="<?php echo $dataOneU[0]['course']; ?>">
    <input type="hidden" name="pointDeVie" value="<?php echo $dataOneU[0]['pointDeVie']; ?>">
    <input type="hidden" name="sauvegarde" value="<?php echo $dataOneU[0]['sauvegarde']; ?>">
    <input type="hidden" name="vol" value="<?php echo $dataOneU[0]['vol']; ?>">
    <input type="hidden" name="station" value="<?php echo $dataOneU[0]['station']; ?>">
    <input type="hidden" name="niveauMage" value="<?php echo $dataOneU[0]['niveauMage']; ?>">
    <button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-copy"></i></button>
  </form>
</section>
<?php
  include 'footer.php';
?>
