<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['idUnite']);
  $requetteSQL = "DELETE FROM `vehicule` WHERE `idVehicule`= :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  header('location:../../gestionVehicule.php');
} else {
  header('location:../../index.php');
}
 ?>
