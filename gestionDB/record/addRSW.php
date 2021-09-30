<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idRS = filter($_POST['id_RS']);
  $idArme = filter($_POST['id_arme']);
  $requetteSQL = "SELECT `idARS`, `id_arme`, `id_RS` FROM `RSArme` WHERE `id_arme`= :idArme AND  `id_RS`= :idRS";
  include '../readDB.php';
  $data->bindParam(':idRS', $idRS);
  $data->bindParam(':idArme', $idArme);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataControle = $data->fetchAll();
  print_r($dataControle);
  if (empty($dataControle)) {
    $requetteSQL  = "INSERT INTO `RSArme`(`id_arme`, `id_RS`) VALUES (:idArme, :idRS)";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':idArme', $idArme);
    $data->bindParam(':idRS', $idRS);
    $data->execute();
    // Redirection vers ajout de règles spécial -> avec l'id de l'arme.
    // Prise en compte de la valeur de la RS
    $valeur = filter($_POST['valeur']);
    // Récupération de la valeur de l'arme en lecture
    $requetteSQL = "SELECT `idArme`, `valeur` FROM `armes` WHERE `idArme` = :id";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $idArme);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataValeur = $data->fetchAll();
    // Opération sur la valeur
    $nouvelleValeur = $dataValeur[0]['valeur'] * (1 + $valeur);
    // Update de la nouvelle valeur
    $requetteSQL = "UPDATE `armes` SET `valeur`= :newValeur WHERE `idArme` = :id";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $idArme);
    $data->bindParam(':newValeur', $nouvelleValeur);
    $data->execute();
    header('location:../../addRS.php?idArme='.$idArme.'');
  } else {
  header('location:../../addRS.php?idArme='.$idArme.'');
  }

} else {
//  header('location:../../index.php');
}

 ?>
