<?php
include '../identifiantDB.php';
include '../controleFormulaires.php';
if (($_SERVER['REQUEST_METHOD'] === 'POST') && (!empty($_POST['emailUser'])) && (!empty($_POST['token6'])) && (!empty($_POST['mdp']))) {
$email = filter($_POST['emailUser']);
$token = filter($_POST['token6']);
if ($token < 99999) {
  header('location:https://blog.ludis-r5.fr');
}
$moria = filter($_POST['mdp']);
$mdp = haschage($moria);
$requetteSQL = "UPDATE `users` SET `token6`= 0, `mdp` = :mdp WHERE `token6` = :token AND `emailUser`= :email";
include '../readDB.php';
$data->bindParam(':email', $email);
$data->bindParam(':mdp', $mdp);
$data->bindParam(':token', $token);
$data->execute();
header('location:../../index.php');
} else {
 header('location:https://blog.ludis-r5.fr');
}
 ?>
