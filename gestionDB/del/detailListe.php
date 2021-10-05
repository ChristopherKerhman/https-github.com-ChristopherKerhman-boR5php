<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if (!empty($_GET['id'])) {
  $id = filter($_GET['id']);
  $idListe = filter($_GET['idListe']);
  $requetteSQL = "DELETE FROM `doterListeArmee` WHERE `idDotationListe` = :id";
  include '../readDB.php';
    $data->bindParam(':id', $id);
  $data->execute();
  $requetteSQL = "SELECT SUM(`TotalValeur`) AS `Total` FROM `doterListeArmee` WHERE `idListe` = :idListe";
  $data = $conn->prepare($requetteSQL);
    $data->bindParam(':idListe', $idListe);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  $valeurListe = $dataTraiter[0]['Total'];
  if ($valeurListe == NULL) {
    $valeurListe = 0;
  }
 $requetteSQL = "UPDATE `listeArmee` SET `valeurListe`= :valeurListe WHERE `idListeArmee` = :idListe";
  $data = $conn->prepare($requetteSQL);
    $data->bindParam(':idListe', $idListe);
    $data->bindParam(':valeurListe', $valeurListe);
  $data->execute();
  header('location:../../doter.php?id='.$idListe);
} else {
  header('location:../../index.php');
}

 ?>
