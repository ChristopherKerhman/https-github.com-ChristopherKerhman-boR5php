<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$idDotation = filter($_POST['idDotation']);
$idUnite = filter($_POST['idUnite']);
$valeur = filter($_POST['valeur']);
  $requetteSQL = "DELETE FROM `unite_armes` WHERE `idDotation` = :idDotation ;
  UPDATE `unites` SET `valeurUnite`= :valeur WHERE `idUnite`= :idUnite";
  include '../readDB.php';
  $data->bindParam(':idDotation', $idDotation);
  $data->bindParam(':valeur', $valeur);
  $data->bindParam(':idUnite', $idUnite);
  $data->execute();
  header('location:../../dotationUnite.php?id='.$idUnite);
} else {
  header('location:../../index.php');
}
 ?>
