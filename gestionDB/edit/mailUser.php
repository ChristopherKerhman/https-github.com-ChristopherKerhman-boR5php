<?php
$autorisation = 1;
$requetteSQL = "";
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
include '../readDB.php';
// Fonction pour détecter un mail en doublon dans la DB
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$emailUSer = $_POST['emailUSer'];
//Doublons de mail
$requetteSQL = "SELECT `emailUser` FROM `users` WHERE `emailUser` = :mail";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':mail', $emailUSer);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataDoublon = $data->fetchAll();
  // Fin des doublons
if (empty($dataDoublon)) {
  $token = rand(100000,999999);
    $to = $emailUSer;
    $subject = 'Votre token de sécurité';
    $message = 'Token de sécurité'.$token;
    $headers = 'From: aresh_e430@ludis-r5.fr';
      if (mail($to, $subject, $message, $headers)) {
        $emailUSer = filter($_POST['emailUSer']);
        $id = filter($_SESSION['idUser']);
        $requetteSQL = "UPDATE `users` SET `emailUser`=:emailUser,`token6` = :token6, `emailValide`= 0 WHERE `idUser`= :id";
        $data = $conn->prepare($requetteSQL);
        $data->bindParam(':id', $id);
        $data->bindParam(':emailUser', $emailUSer);
        $data->bindParam(':token6', $token);
        $data->execute();
        header('location:../../editEMAIL.php?message=envoie ok');
      } else {
          // Fin de la boucle Mail
          // Test en local
        /*  $emailUSer = filter($_POST['emailUSer']);
          $id = filter($_SESSION['idUser']);
          $requetteSQL = "UPDATE `users` SET `emailUser`=:emailUser,`token6` = :token6, `emailValide`= 0 WHERE `idUser`= :id";
          $data = $conn->prepare($requetteSQL);
          $data->bindParam(':id', $id);
          $data->bindParam(':emailUser', $emailUSer);
          $data->bindParam(':token6', $token);
          $data->execute();*/
          //Test en local
            header('location:../../editEMAIL.php?message=envoie échoué');
      }

} else {
  header('location:../../editEMAIL.php?message=Le mail est déjà utilisé.');
}
} else {
// fin de la boucle $_SERVER
  header('location:../../index.php');
}





 ?>
