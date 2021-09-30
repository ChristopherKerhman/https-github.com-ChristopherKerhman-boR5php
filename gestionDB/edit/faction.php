<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
include '../../stockage/librairie.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  checkemptyData($_POST['nomFaction']);
  $nomFaction = filter($_POST['nomFaction']);
  $nomFaction = str_replace($NonClan, $replace, $nomFaction);
  $id = filter($_POST['idFaction']);
  $requetteSQL = "UPDATE `factions` SET `nomFaction`= :nomFaction WHERE `idFaction` = :id";
  include '../readDB.php';
  $data->bindParam(':nomFaction', $nomFaction);
  $data->bindParam(':id', $id);
  $data->execute();
  header('location:../../nouvelleFaction.php');
} else {
  header('location:../../index.php');
}
 ?>
