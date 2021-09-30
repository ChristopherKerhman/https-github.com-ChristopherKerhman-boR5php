<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $faction = filter($_POST['id_faction']);
// Extraction de l'id de l'univers de la faction
  $requetteSQL = "SELECT `idFactionUnivers`FROM `factions` WHERE `idFaction` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $faction);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataUnivers = $data->fetchAll();
  $id_univers = $dataUnivers[0]['idFactionUnivers'];
// fin de l'extraction de l'id de l'univers de la faction
  $nomListe = filter($_POST['nomListe']);
  $loreAssocier = filter($_POST['loreAssocier']);
  if($loreAssocier == 0) {
    $requetteSQL = "INSERT INTO `listeArmee`(`proprietaire`, `id_univers`, `id_faction`, `nomListe`)
    VALUES (:proprietaire, :id_univers, :id_faction, :nomListe)";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':proprietaire', $_SESSION['idUser']);
    $data->bindParam(':id_univers', $id_univers);
    $data->bindParam(':id_faction', $faction);
    $data->bindParam(':nomListe', $nomListe);
  } else {
    $requetteSQL = "INSERT INTO `listeArmee`(`proprietaire`, `id_univers`, `id_faction`, `nomListe`, `loreAssocier`)
    VALUES (:proprietaire, :id_univers, :id_faction, :nomListe, :loreAssocier)";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':proprietaire', $_SESSION['idUser']);
    $data->bindParam(':id_univers', $id_univers);
    $data->bindParam(':id_faction', $faction);
    $data->bindParam(':nomListe', $nomListe);
    $data->bindParam(':loreAssocier', $loreAssocier);
  }
    $data->execute();
    header('location:../../listeArmee.php?message43="Enrgistrement de votre nouvelle liste '.$nomListe.' finalisé"');
} else {
  header('location:../../index.php');
}

 ?>
