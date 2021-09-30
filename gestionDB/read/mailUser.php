<?php
// Vérifier que l'email de sécurité correspond à quelques choses de connus dans la base.
include '../identifiantDB.php';
include '../controleFormulaires.php';
if (($_SERVER['REQUEST_METHOD'] === 'POST') && (!empty($_POST['emailUser']))) {
  $email = filter($_POST['emailUser']);
  $requetteSQL = "SELECT `idUser`, `emailUser` FROM `users` WHERE `emailUser` = :mail AND `emailValide` = 1";
  include '../readDB.php';
  $data->bindParam(':mail', $email);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  print_r($dataTraiter);
  if ($dataTraiter[0]['emailUser'] === $email) {
  $token = rand(100000,999999);
  $to = $email;
  $subject = 'Vous avez oublié votre mot de passe ?';
  $message = 'Vous avez tentez une tentative pour changer votre mot passe, parce que vous avez oublié celui-ci ?'.$token.' est votre token de sécurité, aller sur https://ludis-r5.fr/marcel.php avec celui-ci pour réinitialisé votre mot de passe';
  $headers = 'From: aresh_e430@ludis-r5.fr';
    if (mail($to, $subject, $message, $headers)){
    $requetteSQL = "UPDATE `users` SET `token6` = :token6 WHERE `idUser`= :id";
    include '../readDB.php';
    $data->bindParam(':id', $dataTraiter[0]['idUser']);
    $data->bindParam(':token6', $token);
    $data->execute();
    header('location: https://blog.ludis-r5.fr');
    } else {
    header('location: https://blog.ludis-r5.fr');
  }
}
} else {
header('location: https://blog.ludis-r5.fr');
}
 ?>
