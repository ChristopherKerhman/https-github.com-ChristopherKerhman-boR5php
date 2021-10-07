<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idListe = filter($_POST['idListeArmee']);
  $fixerListe = filter($_POST['fixerListe']);
  $requetteSQL = "UPDATE `listeArmee` SET `fixerListe`= :fixerListe WHERE `idListeArmee` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $idListe);
  $data->bindParam(':fixerListe', $fixerListe);
  $data->execute();
  header('location:../../partagerListe.php');
} else {
  header('location:../../partagerListe.php');
}
 ?>
