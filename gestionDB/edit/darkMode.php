<?php
session_start();
if (empty($_SESSION['role'])) {
  header('location: index.php');
} else {
  include '../identifiantDB.php';
  include '../controleFormulaires.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $darkMode = filter($_POST['darkMode']);
    $requetteSQL = "UPDATE `users`
    SET `darkMode`= :darkMode
    WHERE `idUser` = :id";
    include '../readDB.php';
    $data->bindParam(':darkMode', $darkMode);
    $data->bindParam(':id', $_SESSION['idUser']);
    $data->execute();
    $_SESSION['darkMode'] = $darkMode;
    header('location:../../profilUser.php');
  } else {
    header('location:../../index.php');
  }
}
 ?>
