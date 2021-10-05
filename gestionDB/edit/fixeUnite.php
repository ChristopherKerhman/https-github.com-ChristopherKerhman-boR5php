<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idUnite = filter($_POST['idUnite']);
  $fixer = filter($_POST['fixer']);
  if (intval($fixer) === 0) {
  $requetteSQL = "UPDATE `unites` SET `fixer` = 0 WHERE `idUnite` = :id;
  DELETE FROM `doterListeArmee` WHERE `id_Unite` = :id";
} else {
  $requetteSQL = "UPDATE `unites` SET `fixer` = 1 WHERE `idUnite` = :id;
  DELETE FROM `doterListeArmee` WHERE `id_Unite` = :id";
}
  include '../readDB.php';
  $data->bindParam(':id', $idUnite);
  $data->execute();
  print_r($requetteSQL);
  echo '<br />';
  print_r($fixer);
 header('location:../../gestionUnite.php');
} else {
    header('location:../../index.php');
}
 ?>
