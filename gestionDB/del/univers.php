<?php
$autorisation = 3;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$id = filter($_POST['idUnivers']);
$requetteSQL = "DELETE FROM `multivers` WHERE `idUnivers` = :id";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->execute();
  header('location:../../FicheUser.php?id='.$_POST['idUser'].'');
} else {
  header('location:../../index.php');
}
 ?>
