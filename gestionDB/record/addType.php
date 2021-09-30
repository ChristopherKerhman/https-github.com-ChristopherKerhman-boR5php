<?php
// Entête gestionDB
$autorisation = 3;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $type = filter($_POST['typeDescription']);
  if($type == '') {
    header('location:../../addType.php');
  } else {
    $requetteSQL = "INSERT INTO `typeArme`(`typeDescription`) VALUES (:type)";
    include '../readDB.php';
    $data->bindParam(':type', $type);
    $data->execute();
    header('location:../../addType.php');
  }
} else {
  header('location:../../addType.php');
}
 ?>
