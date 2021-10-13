<?php
$autorisation = 3;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $valide = filter($_POST['valide']);
  $id = filter($_POST['idUnivers']);
  if ($valide == 0) {
  $requetteSQL = "UPDATE `multivers` SET `valide`= 0 WHERE `idUnivers` = :id";
} else {
  $requetteSQL = "UPDATE `multivers` SET `valide`= 1 WHERE `idUnivers` = :id";
}
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  if ($_POST['adresse'] == 1) {
  header('location:../../FicheUser.php?idUser='.$_POST['idUser'].'');
  } else {
  header('location:../../AUnivers.php');
  }
} else {
    header('location:../../index.php');
}
 ?>
