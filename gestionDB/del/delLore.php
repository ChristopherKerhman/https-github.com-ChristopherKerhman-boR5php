<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SESSION['createur'] == 0) {
  header('location:../../index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['idLore']);
  $requetteSQL = "DELETE FROM `lore` WHERE `idLore` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  header('location:../../index.php');
} else {
  header('location:../../index.php');
}
 ?>
