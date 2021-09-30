<?php
session_start();
if (empty($_SESSION['role'])) {
  header('location: index.php');
} else {
  include '../identifiantDB.php';
  include '../controleFormulaires.php';
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = filter($_POST['prenom']);
    checkemptyData($prenom);
    $nom = filter($_POST['nom']);
    checkemptyData($nom);
    $login = filter($_POST['login']);
    checkemptyData($login);
    if(!doublon($login)) {
      header ('location: ../../profilUser.php?error22="speudo existant."');
    } else {
    $consentementUser = filter($_POST['consentementUser']);
    if ($consentementUser == 0) {
      $_SESSION['consentementUser'] = 0;
    }
    $description = filter_Texte($_POST['description']);
    $requetteSQL = "UPDATE `users` SET `login`=:login, `nom`=:nom, `prenom`=:prenom, `description`=:description, `consentementUser`= :consentementUser WHERE `idUser`=:id";
    include '../readDB.php';
    $data->bindParam(':login', $login);
    $data->bindParam(':nom', $nom);
    $data->bindParam(':prenom', $prenom);
    $data->bindParam(':description', $description);
    $data->bindParam(':consentementUser', $consentementUser);
    $data->bindParam(':id', $_SESSION['idUser']);
    $data->execute();
    $_SESSION['login'] = $login;
    if ($_SESSION['consentementUser'] == 0) {
      session_destroy();
      header('location:index.php');
    }
    header('location:../../profilUser.php');}
  } else {
    header('location:../../index.php');
  }
}
 ?>
