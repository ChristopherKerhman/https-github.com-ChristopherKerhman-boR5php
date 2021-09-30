<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idUnite = filter($_POST['id_unite']);
  $idArme = filter($_POST['id_arme']);
  $valeur = filter($_POST['newValeurUnite']);
$requetteSQL = "INSERT INTO `unite_armes`(`id_unite`, `id_arme`) VALUES (:idUnite, :idArme);
UPDATE `unites` SET `valeurUnite`= :valeur WHERE `idUnite` = :idUnite";
include '../readDB.php';
$data->bindParam(':idUnite', $idUnite);
$data->bindParam('idArme', $idArme);
$data->bindParam(':valeur', $valeur);
$data->execute();
  header('location:../../dotationUnite.php?id='.$idUnite);
} else {
  header('location:../../index.php');
}

 ?>
