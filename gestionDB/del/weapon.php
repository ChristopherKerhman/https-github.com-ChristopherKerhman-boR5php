<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['idArme']);
  $requetteSQL = "DELETE FROM `armes` WHERE `idArme` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  if ($_POST['verrou'] == 0){
    header('location:../../gestionWeapon.php');
  } else {
    header('location:../../gestionWeaponV.php');
  }
  //header('location:../../troupes.php');
} else {
  header('location:../../index.php');
}
 ?>
