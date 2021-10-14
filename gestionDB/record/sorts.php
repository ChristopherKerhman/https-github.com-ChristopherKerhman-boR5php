<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
include '../../stockage/sortGenerique.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idMage = filter($_POST['idMage']);
  $indexSortG = filter($_POST['indexSortG']);
  $level = filter($_POST['level']);
  $valeurSortMini = $sort[$indexSortG]['prix'] - $level;
  $valeurSortMax = $sort[$indexSortG]['prix'] + $level ;
  $valeurSort = rand($valeurSortMini, $valeurSortMax);
  $requetteSQL = "SELECT `valeurUnite` FROM `unites` WHERE `idUnite` = :idMage";
  include '../readDB.php';
  $data->bindParam(':idMage', $idMage);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $valeurUnite = $data->fetchAll();
  $valeur = $valeurUnite[0]['valeurUnite'] + $valeurSort;
  $requetteSQL = "INSERT INTO `sortDotationMageG`( `idMage`, `indexSortG`, `valeurSort`) VALUES (:idMage, :indexSortG,:valeurSort);
  UPDATE `unites` SET `valeurUnite`= :valeur WHERE `idUnite` = :idMage";
  include '../readDB.php';
  $data->bindParam(':idMage', $idMage);
  $data->bindParam(':indexSortG', $indexSortG);
  $data->bindParam(':valeurSort', $valeurSort);
  $data->bindParam(':valeur', $valeur);
  $data->execute();
  header('location:../../dotationUnite.php?id='.$idMage);
} else {
  header('location:../../index.php');
}

 ?>
