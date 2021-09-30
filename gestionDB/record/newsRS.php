<?php
// Entête gestionDB
$autorisation = 3;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nomRS = filter($_POST['nomRS']);
  $description = filter_Texte($_POST['description']);
  $pourcentage = filter($_POST['pourcentage']);
  $pourcentage = intval($pourcentage);
  $pourcentage = $pourcentage/100;
  $typeRS = filter($_POST['typeRS']);
  $requetteSQL = "INSERT INTO `reglesSpeciales`(`nomRS`, `descriptionRS`, `valeurRS`, `typeRS`) VALUES (:nomRS, :descriptionRS, :valeurRS, :typeRS)";
  include '../readDB.php';
  $data->bindParam(':nomRS', $nomRS);
  $data->bindParam(':descriptionRS', $description);
  $data->bindParam(':valeurRS', $pourcentage);
  $data->bindParam(':typeRS', $typeRS);
  $data->execute();
  header('location:../../specialRules.php');
} else {

}
