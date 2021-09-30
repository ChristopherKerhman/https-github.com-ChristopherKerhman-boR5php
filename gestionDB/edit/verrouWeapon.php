<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $verrou = filter($_POST['verrou']);
  $idArme = filter($_POST['idArme']);
  $requetteSQL = "UPDATE `armes` SET `verrou`= :verrou WHERE `idArme`= :idArme";
  include '../readDB.php';
  $data->bindparam(':verrou', $verrou);
  $data->bindParam(':idArme', $idArme);
  $data->execute();
  header('location:../../gestionWeapon.php');
} else {
  header('location:../../index.php');
}

 ?>
