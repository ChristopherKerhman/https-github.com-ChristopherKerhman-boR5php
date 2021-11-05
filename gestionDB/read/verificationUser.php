<?php
session_start();
include '../identifiantDB.php';
include '../controleFormulaires.php';
if(($_SERVER['REQUEST_METHOD'] === 'POST') && ((!empty($_POST['login']) && (!empty($_POST['motDePasse']))))) {
  $login = filter($_POST['login']);
  $moria = $_POST['motDePasse'];
  $requetteSQL = "SELECT `idUser`,`login`, `mdp`, `role`, `createur`, `contributeur`, `consentementUser`, `darkMode`
  FROM `users`
  WHERE `login` = :login AND `consentementUser` = 1;
  UPDATE `users` SET `token6` = 0 WHERE `login` = :login";
  include '../readDB.php';
  $data->bindParam(':login', $login);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  if(($dataTraiter[0]['login'] == $login) && (password_verify($moria, $dataTraiter[0]['mdp'])) && ($dataTraiter[0]['role'] >= 1) ) {
    $_SESSION['idUser'] = $dataTraiter[0]['idUser'];
    $_SESSION['login'] = $login;
    $_SESSION['role'] = $dataTraiter[0]['role'];
    $_SESSION['createur'] = $dataTraiter[0]['createur'];
    $_SESSION['contributeur'] = $dataTraiter[0]['contributeur'];
    $_SESSION['consentementUser'] = $dataTraiter[0]['consentementUser'];
    $_SESSION['darkMode'] = $dataTraiter[0]['darkMode'];
    $ok = $dataTraiter[0]['consentementUser'];
    $requetteSQL = "INSERT INTO `journaux`(`ip_client`, `idUser`, `login`, `connexionOk`) VALUES (:ip, :idUser, :login, :ok)";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':ip', $_SERVER['REMOTE_ADDR']);
    $data->bindParam(':idUser', $dataTraiter[0]['idUser']);
    $data->bindParam(':login', $login);
    $data->bindParam(':ok', $ok);
    $data->execute();
    header('location:../../index.php');
  } else {
    $ok = 0;
    $requetteSQL = "INSERT INTO `journaux`(`ip_client`, `connexionOk`) VALUES (:ip, :ok)";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':ip', $_SERVER['REMOTE_ADDR']);
    $data->bindParam(':ok', $ok);
    $data->execute();
    header('location:../../connexionUser.php?error2="login ou mot de passe incorrecte"');
  }
} else {
  header('location:../../connexionUser.php?error3="Erreur de traitement"');
}
 ?>
