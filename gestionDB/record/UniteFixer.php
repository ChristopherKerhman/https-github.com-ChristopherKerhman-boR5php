<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
// Tableau - Utilisé pour rendre lisible les données.
include '../../stockage/typeTroupe.php';
include '../../stockage/de.php';
include '../../stockage/sauvegarde.php';
include '../../stockage/pointDeVie.php';
include '../../stockage/typeFigurine.php';
include '../../stockage/yes.php';
include '../../stockage/gabarit.php';
// Fin tableau
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_univers = filter($_POST['id_univers']);
  $id_faction = filter($_POST['id_faction']);
  $id_unite = filter($_POST['id_unite']);
  // Génération de donnéelse

// premier requette
$requetteSQL = "SELECT `unites`.`idUnite`, `unites`.`idP`, `unites`.`nomFigurine`, `unites`.`Description`, `unites`.`typeTroupe`,
`unites`.`taille`, `unites`.`niveauMage`, `unites`.`deplacement`, `unites`.`course`, `unites`.`vol`, `unites`.`station`, `unites`.`DQM`,
`unites`.`DC`, `unites`.`sauvegarde`, `unites`.`pointDeVie`, `unites`.`valeurUnite`, `unites`.`fixer`,`unites`.`id_faction`, `factions`.`nomFaction`, `factions`.`idFactionUnivers` FROM `unites`
INNER JOIN `factions` ON `unites`.`id_faction` = `factions`.`idFaction`
WHERE `unites`.`idUnite` = :id";
include '../readDB.php';
$data->bindParam(':id', $id_unite);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUnite = $data->fetchAll();

$unite = array (
  'idunite' => $dataUnite[0]['idUnite'],
  'idP' => $dataUnite[0]['idP'],
  'nomFaction' => $dataUnite[0]['nomFaction'],
  'nomFigurine' => $dataUnite[0]['nomFigurine'],
  'Description' => $dataUnite[0]['Description'],
  'typeTroupe' => $typeTroupe[$dataUnite[0]['typeTroupe']]['troupe'],
  'taille' => $typeFigurine[$dataUnite[0]['taille']]['taille'],
  'niveauMage' => $dataUnite[0]['niveauMage'],
  'mouvementTactique' => $dataUnite[0]['deplacement'],
  'course' => $dataUnite[0]['course'],
  'vol' => $yes[$dataUnite[0]['vol']]['texte'],
  'stationnaire' => $yes[$dataUnite[0]['station']]['texte'],
  'DQM' => $typeDe[$dataUnite[0]['DQM']]['de'],
  'DC' => $typeDe[$dataUnite[0]['DC']]['de'],
  'sauvegarde' => $sauvegarde[$dataUnite[0]['sauvegarde']]['Type'],
  'pointDeVie' => $pdv[$dataUnite[0]['pointDeVie']]['pdv'],
  'prix' => $dataUnite[0]['valeurUnite']);
$unite = json_encode($unite);
// A quoi sert la collection
$collection = [$dataUnite[0]['idFactionUnivers'], $dataUnite[0]['id_faction'], $dataUnite[0]['idP'], $dataUnite[0]['idUnite'], $unite];
//print_r($uniteJSON);
$requetteSQL = "SELECT `idDotation`, `id_unite`, `id_arme` FROM `unite_armes` WHERE `id_unite` =".$dataUnite[0]['idUnite'];
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataDotation = $data->fetchAll();
//print_r($dataDotation); echo '<br />';
$equipement = array();
  foreach ($dataDotation as $key) {
    $idArme = $key['id_arme'];
    $requetteSQL = "SELECT `idArme`, `nomArme`, `descriptionArme`, `rangeMax`, `puissance`, `valide`, `lourde`, `assaut`, `couverture`,
    `sort`, `cadence`, `type`, `idCreateur`, `idUnivers`, `valeur`, `explosif`, `dExplosive` FROM `armes` WHERE `idArme`=".$key['id_arme'];
    $data = $conn->prepare($requetteSQL);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataWeapon = $data->fetchAll();
  //print_r($dataWeapon); echo '<br />';
  // Définition de équipement
  foreach ($dataWeapon as $key) {
  $requetteRS = "SELECT `reglesSpeciales`.`nomRS` FROM `RSArme`
  INNER JOIN `reglesSpeciales` ON `RSArme`.`id_RS` = `reglesSpeciales`.`idRS`
  WHERE `RSArme`.`id_arme` = ".$key['idArme'];
  $data = $conn->prepare($requetteRS);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataRSW = $data->fetchAll();
  if($key['rangeMax'] <= 2) {
  $range = 'Arme de mêlée';
  } else {
  $range = $key['rangeMax'];
  }
    $dotation = array (
    'idArme' => $key['idArme'],
    'nomArme' => $key['nomArme'],
    'descriptionArme' => $key['descriptionArme'],
    'rangeMax' => $range,
    'puissance' => $key['puissance'],
    'lourde' => $key['lourde'],
    'assaut' => $key['assaut'],
    'couverture' => $key['couverture'],
    'sort' => $key['sort'],
    'cadence' => $key['cadence'],
    'type' => $key['type'],
    'explosif' => $key['explosif'],
    'dExplosive' => $key['dExplosive'],
    'RS' => $dataRSW);
  //$equipement[] = $dotation;
  array_push($equipement, $dotation);
//  echo '<br />Dotation <br />';
//  print_r($dotation);
  }
  $equipementJSON = json_encode($equipement);
  //print_r($equipementJSON);
  //  $equipement = array();
  // Remise à zéro de équipement
}
  // Fin de génération des données
  //$fixe_unite = $_POST['fixe_unite'];
  //$fixe_equipement = $_POST['fixe_equipement'];
  $valide = 1;
  $requetteSQL = "INSERT INTO `fixeUnite`(`id_univers`, `id_faction`, `id_proprietaire`, `id_unite`, `fixe_unite`, `fixe_equipement`, `valide`)
  VALUES (:id_univers, :id_faction, :id_proprietaire, :id_unite, :fixe_unite, :fixe_equipement, :valide);
  UPDATE `unites` SET `fixer`= 1 WHERE `idUnite` = :id_unite";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id_univers', $id_univers);
  $data->bindParam(':id_faction', $id_faction);
  $data->bindParam(':id_proprietaire', $_SESSION['idUser']);
  $data->bindParam(':id_unite', $id_unite);
  $data->bindParam(':fixe_unite', $unite);
  $data->bindParam(':fixe_equipement', $equipementJSON);
  $data->bindParam(':valide', $valide);
  $data->execute();
  header('location:../../fixeUnite.php');
} else {
  header('location:../../index.php');
}
 ?>
