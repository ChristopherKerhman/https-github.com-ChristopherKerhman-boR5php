<?php
// Déclaration de tous les outils pour construire ma requette d'enregistrement.
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $prenom = filter($_POST['prenom']);
  $nom = filter($_POST['nom']);
  $login = filter($_POST['login']);
  $moria = filter($_POST['mdp']);
  if (($prenom == "") || ($nom == "") || ($login == "") || ($moria == "")) {
    header ('location: ../../NouveauUtilisateur.php?error="Une erreur a été détecter."');
  } else {
  $mdp = haschage($moria);
  $consentementUser = filter($_POST['consentementUser']);
  // Contrôle lier à la fonction RGPD.
  if (empty($_POST['consentementUser'])) {
    header ('location: ../../NouveauUtilisateur.php?error1="Il faut accepter la RGPD pour enregistrer votre compte."');
  } elseif ($consentementUser == 'on') {
    $consentementUser = 1;
  }
  // Verification que le login n'est pas un doublon
  if(!doublon($login)) {
    header ('location: ../../NouveauUtilisateur.php?error="speudo existant."');
  } else {
  if (($consentementUser == 1)) {
    $requetteSQL = "INSERT INTO `users`(`login`, `mdp`, `consentementUser`, `nom`, `prenom`, `createur`, `contributeur`) VALUES (:login, :mdp, 1, :nom, :prenom, 1, 0)";
    include '../readDB.php';
    $data->bindParam(':login', $login);
    $data->bindParam(':mdp', $mdp);
    $data->bindParam(':nom', $nom);
    $data->bindParam(':prenom', $prenom);
    $data->execute();
    header('location:../../index.php');
    }
  }
}
} else {
  header('location:../../index.php');
}

 ?>
