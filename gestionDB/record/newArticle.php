<?php
// Entête gestionDB
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Contrôle des champs vides.
  if(strlen($_POST['titreLore']) < 4) {
    header('location:../../createArticle.php?error5="Titre manquant."');
  } else if(strlen($_POST['articleLore']) < 250) {
    header('location:../../createArticle.php?error6="Texte trop court."');
  } else {
    $valide = 1;
    $idAuteur = $_SESSION['idUser'];
    if (empty($_POST['idMultivers'])) {
    header('location:../../index.php');
    }
    $idMultivers = filter($_POST['idMultivers']);
    $titre = filter($_POST['titreLore']);
    $article = filter_Texte($_POST['articleLore']);
    $niveau = filter($_POST['niveauPublication']);
    $requetteSQL = "INSERT INTO `lore`(`idAuteur`, `idMultivers`, `titreLore`, `articleLore`, `valide`, `niveauPublication`, `ip-auteur`) VALUES (:idAuteur, :idMultivers, :titre, :article, :valide, :niveau, :ip)";
    include '../readDB.php';
    $data->bindParam(':ip', $_SERVER['REMOTE_ADDR']);
    $data->bindParam(':idAuteur', $idAuteur);
    $data->bindParam(':idMultivers', $idMultivers);
    $data->bindParam(':titre', $titre);
    $data->bindParam(':article', $article);
    $data->bindParam(':valide', $valide);
    $data->bindParam(':niveau', $niveau);
    $data->execute();
      header('location:../../index.php');
  }
} else {
    header('location:../../createArticle.php?error7="Soucis de traitement."');
}


?>
