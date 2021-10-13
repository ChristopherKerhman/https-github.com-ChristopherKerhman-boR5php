<?php
$autorisation = 3;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['idRS']);
  $requetteSQL = "DELETE FROM `reglesSpeciales` WHERE `idRS` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  header('location:../../specialRules.php');
} else {
  header('location:../../index.php');
}
 ?>
