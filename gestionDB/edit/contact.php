<?php
$autorisation = 3;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['id']);
  $traitement = filter($_POST['traitement']);
  $requetteSQL = "UPDATE `contact` SET `traitement`= :traitement WHERE `idContact` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->bindParam(':traitement', $traitement);
  $data->execute();
  header('location:../../gestionContact.php');
} else {
  header('location:../../gestionContact.php');
}
 ?>
