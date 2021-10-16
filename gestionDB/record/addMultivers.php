<?php
// Entête gestionDB
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
// Contrôle autorisation au cas où l'utilisateur n'a pas d'autorisation pour créer un univers.
if ($_SESSION['createur'] == 0) {
  header('location:../../index.php');
} else {
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  if($_POST['nomUnivers'] == '') {
    header('location:../../createUnivers.php?error4="Nom de votre univers vide"');
  } else {
    $nomUnivers = filter($_POST['nomUnivers']);
    $NT = filter($_POST['NT']);
    $idAuteur = filter($_SESSION['idUser']);
    $count = intval($_SESSION['createur']) - 1;
    $requetteSQL = "INSERT INTO `multivers`(`nomUnivers`, `idAuteur`, `valide`, `NT`) VALUES (:nomUnivers, :idAuteur, :valide, :NT)";
    include '../readDB.php';
    $valide = 1;
      $data->bindParam(':nomUnivers', $nomUnivers);
      $data->bindParam(':idAuteur', $idAuteur);
      $data->bindParam(':valide', $valide);
      $data->bindParam(':NT', $NT);
      $data->execute();
    // Update du profil créateur pour qu'il ne puisse créer qu'un seul univers.
    $requetteSQL = "UPDATE `users` SET `createur`= :count WHERE `idUser`=:idAuteur";
    include '../readDB.php';
      $data->bindParam(':idAuteur', $idAuteur);
      $data->bindParam(':count', $count);
      $data->execute();
    header('location:../../createUnivers.php');
    $_SESSION['createur'] = $count;
}
} else {
  header('location:../../index.php');
}
}
 ?>
