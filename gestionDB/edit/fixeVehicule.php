<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idUnite = filter($_POST['idVehicule']);
  $fixer = filter($_POST['fixer']);
  if (intval($fixer) === 0) {
  $requetteSQL = "UPDATE `vehicule` SET `fixer` = 0 WHERE `idVehicule` = :id";
} else {
  $requetteSQL = "UPDATE `vehicule` SET `fixer` = 1 WHERE `idVehicule` = :id";
}
  include '../readDB.php';
  $data->bindParam(':id', $idUnite);
  $data->execute();
  print_r($requetteSQL);
  echo '<br />';
  print_r($fixer);
 header('location:../../gestionVehicule.php');
} else {
    header('location:../../index.php');
}
 ?>
