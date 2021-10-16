<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['id']);
  $idMage = filter($_POST['idMage']);
  $valeurUnite = filter($_POST['valeurUnite']);
  // Recupération valeur sort
  $requetteSQL = "SELECT `valeurSort` FROM `sortDotationMageG` WHERE `idDotationSortG` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataValeur = $data->fetchAll();
  $valeurUnite = $valeurUnite - $dataValeur[0]['valeurSort'];
  // Enregistrement et del du sort
  $requetteSQL = "DELETE FROM `sortDotationMageG` WHERE `idDotationSortG` = :id;
  UPDATE `unites` SET `valeurUnite`= :valeur WHERE `idUnite` = :idMage";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $id);
  $data->bindParam(':idMage', $idMage);
  $data->bindParam(':valeur', $valeurUnite);
  $data->execute();
  // Retour à la fiche
  header('location:../../dotationUnite.php?id='.$idMage);
} else {
  header('location:../../index.php');
}
 ?>
