<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['idFaction']);
  $requetteSQL = "DELETE FROM `factions` WHERE `idFaction` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  header('location:../../nouvelleFaction.php');
} else {
  header('location:../../index.php');
}
?>
