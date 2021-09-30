<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
include '../../stockage/de.php';
// Tableau pour les véhicules
include '../../stockage/de.php';
include '../../stockage/typeVehicule.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['idVehicule']);
  checkemptyData($_POST['id_faction']);
  $id_faction = filter($_POST['id_faction']);
  checkemptyData($_POST['nomVehicule']);
  $nomVehicule = filter($_POST['nomVehicule']);
  $typeVehiculeF = filter($_POST['typeVehicule']);
  $equipageF = filter($_POST['equipage']);
  $passagerF = filter($_POST['passager']);
  checkemptyData($_POST['descriptionVehicule']);
  $descriptionVehicule = filter($_POST['descriptionVehicule']);
  $deplacement = filter($_POST['deplacement']);
  $course = filter($_POST['course']);
  $vol = filter($_POST['vol']);
  $station = filter($_POST['station']);
  $DQM = filter($_POST['DQM']);
  $DC = filter($_POST['DC']);
  $pointStructure = filter($_POST['pointStructure']);
  $svg = filter($_POST['svg']);
  // Calcul de la valeur du véhicule
  $vDC = $typeDe[$DC]['prix'];
  $vDQM = $typeDe[$DQM]['prix'];
  $vTV = $typeVehicule[$typeVehiculeF]['prix'];
  $vTeam = $equipage[$equipageF]['prix'];
  $vPas = $passager[$passagerF]['prix'];
  $vPS = $structure[$pointStructure]['prix'];
  $vSVG = $blindage[$svg]['prix'];
  $valeur = ($vDC + $vDQM + $vTV + $vTeam + $vPas + $vPS + ($deplacement * ($vol + $station + 0.5))) * $vSVG;
  // Fin déclaration
  $requetteSQL = "UPDATE `vehicule` SET
  `id_faction`= :id_faction,
  `nomVehicule`= :nomVehicule,
  `descriptionVehicule`= :descriptionVehicule,
  `typeVehicule`= :typeVehicule,
  `mouvementVehicule`= :mouvementVehicule,
  `courseVehicule`= :courseVehicule,
  `vol`= :vol,
  `stationnaire`= :stationnaire,
  `equipage`= :equipage,
  `passager`= :passager,
  `DQM`= :DQM,
  `DC`= :DC,
  `svg`= :svg,
  `pointStructure`= :pointStructure,
  `valeur`=:valeur,
  `fixer`= :fixer,
  `valide`= :valide
  WHERE `idVehicule`= :id;
  DELETE FROM `vehicule_armes` WHERE `id_vehicule`= :id";
  include '../readDB.php';
  $fixer = 0;
  $valide = 1;
  $data->bindParam(':id', $id);
  $data->bindParam(':id_faction', $id_faction);
  $data->bindParam(':nomVehicule', $nomVehicule);
  $data->bindParam(':descriptionVehicule', $descriptionVehicule);
  $data->bindParam(':typeVehicule', $typeVehiculeF);
  $data->bindParam(':mouvementVehicule', $deplacement);
  $data->bindParam(':courseVehicule', $course);
  $data->bindParam(':vol', $vol);
  $data->bindParam(':stationnaire', $station);
  $data->bindParam(':equipage', $equipageF);
  $data->bindParam(':passager', $passagerF);
  $data->bindParam(':DQM', $DQM);
  $data->bindParam(':DC', $DC);
  $data->bindParam(':svg', $svg);
  $data->bindParam(':pointStructure', $pointStructure);
  $data->bindParam(':valeur', $valeur);
  $data->bindParam(':fixer', $fixer);
  $data->bindParam(':valide', $valide);
  $data->execute();
  header('location:../../vehicules.php');
} else {
  header('location:../../index.php');
}



 ?>
