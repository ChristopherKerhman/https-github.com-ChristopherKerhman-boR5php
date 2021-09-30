<?php
// Entête gestionDB
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
include '../../stockage/librairie.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (empty($_POST['idMultivers'])) {
  header('location:../../index.php');
  }
  $idFactionUnivers = filter($_POST['idMultivers']);
  checkemptyData($_POST['nomFaction']);
  $nomFaction = filter($_POST['nomFaction']);
  $nomFaction = str_replace($NonClan, $replace, $nomFaction);
  $requetteSQL = "INSERT INTO `factions`(`idFactionUnivers`, `nomFaction`, `id_proprietaire`) VALUES (:idFactionUnivers, :nomFaction, :idP)";
  include '../readDB.php';
  $data->bindParam(':idFactionUnivers', $idFactionUnivers);
  $data->bindParam(':nomFaction', $nomFaction);
  $data->bindParam('idP', intval($_SESSION['idUser']));
  $data->execute();
  header('location:../../nouvelleFaction.php');
} else {
  header('location:../../index.php');
}
 ?>
