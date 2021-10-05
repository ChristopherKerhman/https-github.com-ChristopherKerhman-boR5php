<?php
$autorisation = 1;
include 'restriction/session.php';
include 'stockage/figurine.php';
include 'gestionDB/read/liste.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="<?php echo $vueJSCDN; ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/js/all.min.js"></script>
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.12.17/css/grapes.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/grapesjs/0.12.17/grapes.min.js"></script>-->
    <link rel="stylesheet" href="<?php echo $css; ?>">
    <title><?php echo $titre.' Liste '.$dataListeName[0]['nomListe']; ?></title>
  </head>
<body class="publication">
<section class="leftPublication">
  <h3>Liste : <?php echo $dataListeName[0]['nomListe'].' Valeur : '.$dataListeName[0]['valeurListe'].' Points'; ?> </h3>
<?php
//Read liste Unite
foreach ($dataListeUnite as $key) {
echo '<ul class="listRS">';
echo'<li><h4>'.$key['nomFigurine'].' - Nombre : '.$key['nbr'].' - Valeur total : '.$key['TotalValeur'].'</h4></li>';
  $requetteSQL = "SELECT `typeTroupe`, `taille`, `niveauMage`, `deplacement`, `course`, `vol`, `station`, `DQM`, `DC`, `sauvegarde`, `pointDeVie`
  FROM `unites`
  WHERE `idUnite` = :idUnite";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':idUnite', $key['id_Unite']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataUnite = $data->fetchAll();
  $idU =  $key['id_Unite'];
  foreach ($dataUnite as $key) {
    echo '<li><strong>Type de troupe : </strong>'.$typeTroupe[$key['typeTroupe']]['troupe'].' <strong>DQM :</strong> '.$typeDe[$key['DQM']]['de'].' </li>';
    if ($key['typeTroupe'] == 6) {
      echo '<li><strong>Niveau du Mage</strong>: '.$key['niveauMage'].'</li>';
    }
    echo '<li><strong>Mouvement :</strong> '.$key['deplacement'].'" / '.$key['course'].'" + 1D4" - <strong>Vol :</strong> '.$yes[$key['vol']]['texte'].' - <strong>Vol stationnaire : </strong>'.$yes[$key['station']]['texte'].'</li>';

$requetteSQL = "SELECT `idDotation`, `idArme`, `nomArme`, `rangeMax`, `puissance`, `lourde`, `assaut`, `couverture`, `sort`, `cadence`, `type`,`explosif`, `dExplosive`
FROM `unite_armes`
INNER JOIN `armes` ON `id_arme` = `idArme`
WHERE `id_unite`= :idU ORDER BY `type` ASC";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':idU', $idU);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataWeapon = $data->fetchAll();
// Affichage des armes
foreach ($dataWeapon as $gun) {
  if ($gun['type'] == 1) {
    echo '<li><strong>Arme de mêlée : </strong> '.$gun['nomArme'].' <strong>Puissance :</strong> '.$gun['puissance'].$typeDe[$key['DC']]['de'].' <strong>Sort :</strong>'.$yes[$gun['sort']]['texte'];
  }
  if ($gun['type'] == 2) {
    echo '<li><strong>Arme de tir : </strong> '.$gun['nomArme'].'&thinsp;<strong>Portée :</strong>'.$gun['rangeMax'].' " <strong>Puissance :</strong> '.$gun['puissance'].$typeDe[$key['DC']]['de'].'
    <strong>Sort :</strong>'.$yes[$gun['sort']]['texte'].'
    <strong>Arme lourde :</strong>'.$yes[$gun['lourde']]['texte'].'
    <strong>Assaut :</strong>'.$yes[$gun['assaut']]['texte'];
    if ($gun['couverture'] == 1) {
      echo '<strong>Couverture</strong>'.$yes[$gun['couverture']]['texte'].'
      <strong>Cadende de tir :</strong>'.$yes[$gun['cadence']]['texte'];
    }
  }
  if ($gun['type'] == 3) {
    echo '<li><strong>Arme explosive : </strong> '.$gun['nomArme'].'&thinsp;<strong>Portée :</strong>'.$gun['rangeMax'].' " <strong>Puissance :</strong> '.$gun['puissance'].$typeDe[$key['DC']]['de'].'
    <strong>Sort :</strong>'.$yes[$gun['sort']]['texte'].'
    <strong>Arme lourde :</strong>'.$yes[$gun['lourde']]['texte'].'
    <strong>Assaut :</strong>'.$yes[$gun['assaut']]['texte'];
    if ($gun['couverture'] == 1) {
      echo '&thinsp;<strong>Couverture</strong>'.$yes[$gun['couverture']]['texte'].'&thinsp;<strong>Cadende de tir :</strong>'.$yes[$gun['cadence']]['texte'];
    }
    echo '&thinsp;<strong>Puissance Explosif :</strong> '.$explosion[$gun['dExplosive']]['texte'].'&thinsp;<strong>Gabarit :</strong> '.$gabarit[$gun['explosif']]['texte'].'';
  }
  // Extraction des règles spéciales
  $requetteSQL = "SELECT `nomRS`
  FROM `RSArme`
  INNER JOIN `reglesSpeciales` ON `idRS` = `id_RS`
  WHERE `id_arme` = :idW";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':idW', $gun['idArme']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataRS = $data->fetchAll();
  echo '&thinsp;<strong>Règles spécial </strong>( ';
  foreach ($dataRS as $listeRS) {
  echo ' '.$listeRS['nomRS'].' ';
  }
  echo ')';
  // Fin de l'extraction des règles spécial
}
  echo '</li><br />';
// Fin affichage des armes
    }
    // Suite fiches Unite
  echo '<li><strong>Sauvegarde :</strong>  '.$sauvegarde[$key['sauvegarde']]['Type'].' <strong>Point de Vie :</strong> '.$pdv[$key['pointDeVie']]['pdv'].' points</li>';
echo '</ul>';
// Fin de la fiche
  }
// ReadListe Vehicule
//print_r($dataListeVehicule);
 ?>
</section>
</body>
</html>
