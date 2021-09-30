<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idUnite = filter($_POST['id_vehicule']);
  $idArme = filter($_POST['id_arme']);
  $valeur = filter($_POST['newValeurUnite']);
$requetteSQL = "INSERT INTO `vehicule_armes`( `id_arme`, `id_vehicule`) VALUES (:idArme, :idVehicule);
UPDATE `vehicule` SET `valeur`= :valeur WHERE `idVehicule` = :idVehicule";
include '../readDB.php';
$data->bindParam(':idVehicule', $idUnite);
$data->bindParam('idArme', $idArme);
$data->bindParam(':valeur', $valeur);
$data->execute();
  header('location:../../dotationVehicule.php?id='.$idUnite);
} else {
  header('location:../../index.php');
}

 ?>
