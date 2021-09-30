<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $token = filter($_POST['token']);
  $id = filter($_SESSION['idUser']);
  $requetteSQL = "UPDATE `users` SET `emailValide`= 1, `token6` = 0 WHERE `idUser` = :id AND `token6` = :token";
  include '../readDB.php';
  $data->bindParam(':id', $id);
  $data->bindParam(':token', $token);
  $data->execute();
  header('location:../../editEMAIL.php');
} else {
    header('location:../../index.php');
}
 ?>
