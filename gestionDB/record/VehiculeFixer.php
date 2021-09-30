<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';

// Chargement des tableaux
  include '../../stockage/de.php';
  include '../../stockage/yes.php';
  include '../../stockage/gabarit.php';
  include '../../stockage/typeVehicule.php';
// Fin tableau

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id_univers = filter($_POST['id_univers']);
$id_faction = filter($_POST['id_faction']);
$id_vehicule = filter($_POST['id_vehicule']);
// Génération des données
// Premier lecture pour enregistrer le véhicules
$requetteSQL = "SELECT `idVehicule`, `vehicule`.`id_proprietaire`, `id_faction`, `nomVehicule`, `descriptionVehicule`, `typeVehicule`,
`mouvementVehicule`, `courseVehicule`, `vol`, `stationnaire`, `equipage`, `passager`, `DQM`, `DC`, `svg`, `pointStructure`,
`valeur`,  `factions`.`nomFaction`
FROM `vehicule`
INNER JOIN `factions` ON `vehicule`.`id_faction` = `factions`.`idFaction`
WHERE `vehicule`.`idVehicule` = :id";
include '../readDB.php';
$data->bindParam(':id', $id_vehicule);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataVehicule = $data->fetchAll();
// Fin lecture
// Création du tableau relationnelle de donnéelse
$vehicule = array (
  'idVehicule' => $dataVehicule[0]['idVehicule'],
  'idP' => $dataVehicule[0]['id_proprietaire'],
  'nomFaction' => $dataVehicule[0]['nomFaction'],
  'nomVehicule' => $dataVehicule[0]['nomVehicule'],
  'typeVehicule' => $typeVehicule[$dataVehicule[0]['typeVehicule']]['type'],
  'description' => $dataVehicule[0]['descriptionVehicule'],
  'mouvementTactique' => $dataVehicule[0]['mouvementVehicule'],
  'course' => $dataVehicule[0]['courseVehicule'],
  'vol' => $dataVehicule[0]['vol'],
  'stationnaire'  => $dataVehicule[0]['stationnaire'],
  'equipage'  => $equipage[$dataVehicule[0]['equipage']]['equipage'],
  'passager' => $passager[$dataVehicule[0]['passager']]['nbr'],
  'DQM'  => $typeDe[$dataVehicule[0]['DQM']]['de'],
  'DC'  => $typeDe[$dataVehicule[0]['DC']]['de'],
  'pointStructure' => $structure[$dataVehicule[0]['pointStructure']]['ps'],
  'blindage' => $blindage[$dataVehicule[0]['svg']]['type'],
  'sauvegarde' => $blindage[$dataVehicule[0]['svg']]['svg'],
  'prix' => $dataVehicule[0]['valeur'],
);
$JSONVehicule = json_encode($vehicule);
// Recherche de la dotation du véhicules
$requetteSQL = "SELECT `idArme`, `nomArme`, `descriptionArme`, `rangeMax`, `puissance`, `valide`, `lourde`,
`assaut`, `couverture`, `armeVehicule`, `sort`, `cadence`, `type`, `idCreateur`, `idUnivers`, `valeur`, `explosif`, `dExplosive`
FROM `vehicule_armes`
INNER JOIN `armes` ON `vehicule_armes`.`id_arme` = `armes`.`idArme`
WHERE `id_vehicule` = :id";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $id_vehicule);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataWeapon = $data->fetchAll();
// Equipement à 0
$equipement = array();
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

}
$equipementJSON = json_encode($equipement);
//print_r($JSONVehicule);
//print_r($equipementJSON);
$valide = 1;
$requetteSQL = "INSERT INTO `fixeVehicule`(`id_univers`, `id_faction`, `id_proprietaire`, `id_vehicule`, `fixe_vehicule`, `fixe_equipement`, `valide`)
VALUES (:idUnivers, :idFaction, :idProprietaire, :idVehicule, :fixeVehicule, :fixeEquipement, :valide);
UPDATE `vehicule` SET `fixer`= :valide WHERE `idVehicule` = :idVehicule";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':idUnivers',$id_univers);
  $data->bindParam(':idFaction', $id_faction,);
  $data->bindParam(':idProprietaire', $_SESSION['idUser']);
  $data->bindParam('idVehicule',$id_vehicule);
  $data->bindParam(':fixeVehicule', $JSONVehicule);
  $data->bindParam(':fixeEquipement',$equipementJSON);
  $data->bindParam(':valide', $valide);
  $data->execute();
header('location:../../fixeUnite.php');
} else {
  header('location:../../index.php');
}
 ?>
