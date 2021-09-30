<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if (($_SERVER['REQUEST_METHOD'] === 'POST') && ($_POST['mdpVerif'] == $_POST['mdp']) && ($_POST['mdp'] != '')) {
  $moria = filter($_POST['mdp']);
  checkemptyData($moria);
  $mdp = haschage($moria);
  $id = filter($_SESSION['idUser']);
  $requetteSQL = "UPDATE `users` SET `mdp`=:mdp WHERE `idUser`= :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->bindParam(':mdp', $mdp);
  $data->execute();
  header('location:../../index.php');
} else {
header('location:../../index.php');
}
session_destroy();

 ?>
