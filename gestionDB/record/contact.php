<?php
$autorisation = 0;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if (($_SERVER['REQUEST_METHOD'] === 'POST') && (!empty($_POST['email'])) && (!empty($_POST['message']))) {
  $email = filter($_POST['email']);
  $objet = filter($_POST['objet']);
  $message = filter_Texte($_POST['message']);
  $requetteSQL = "INSERT INTO `contact`(`email`, `objet`, `message`, `traitement`) VALUES (:email, :objet, :message, '0')";
  include '../readDB.php';
  $data->bindParam(':email', $email);
  $data->bindParam(':objet', $objet);
  $data->bindParam(':message', $message);
  $data->execute();
  $to = 'aresh_e430@ludis-r5.fr';
  $objet = 'Message enregistrer sur le back-office de R5:'.$object.' Email pour la réponse :'.$email;
  mail($to,$objet,$message);
header('location:../../index.php?message42="Votre message a bien été enregistré."');
} else {
  header('location:../../index.php');
}
 ?>
