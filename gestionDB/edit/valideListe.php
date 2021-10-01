<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if (isset($_GET['id'])){
$id = filter($_GET['id']);
$requetteSQL = "SELECT `valide` FROM `listeArmee` WHERE `idListeArmee` = :id AND `proprietaire` = :idUser";
include '../readDB.php';
$data->bindParam(':id', $id);
$data->bindParam(':idUser', $_SESSION['idUser']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataValide = $data->fetchAll();
if (!empty($dataValide)) {
    header('location:../../doterListe.php');
}
if  ($dataValide[0]['valide'] == 1) {
  $requetteSQL = "UPDATE `listeArmee` SET `valide`= 0 WHERE `idListeArmee` = :id";
} else {
  $requetteSQL = "UPDATE `listeArmee` SET `valide`= 1 WHERE `idListeArmee` = :id";
}
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $id);
  $data->execute();
  header('location:../../doterListe.php');
} else {
  header('location:../../doterListe.php');
}
 ?>
