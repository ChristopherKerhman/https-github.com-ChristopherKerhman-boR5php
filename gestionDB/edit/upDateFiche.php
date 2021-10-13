<?php
$autorisation = 3;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $idUser = filter($_POST['idUser']);
  // Ajout d'univers
  if (filter($_POST['addU']) == 1) {
  $createur = filter($_POST['createur']);
  $requetteSQL = "UPDATE `users` SET `createur`= :createur WHERE `idUser` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $idUser);
  $data->bindParam(':createur', $createur);
  $data->execute();
  }
  // Modification Tiper
  if (filter($_POST['addU']) == 2) {
  $tiper = filter($_POST['tiper']);
  $requetteSQL = "UPDATE `users` SET `tiper`= :tiper WHERE `idUser` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $idUser);
  $data->bindParam(':tiper', $tiper);
  $data->execute();
  }
  // Modification Tiper
  if (filter($_POST['addU']) == 3) {
  $valide = filter($_POST['valide']);
  $requetteSQL = "UPDATE `users` SET `consentementUser`= :valide WHERE `idUser` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $idUser);
  $data->bindParam(':valide', $valide);
  $data->execute();
  }

  header('location:../../FicheUser.php?idUser='.$idUser.'');
} else {
  header('location:../../index.php');
}

 ?>
