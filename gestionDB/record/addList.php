<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idListe = filter($_POST['idListe']);
  $id_Unite = filter($_POST['id_Unite']);
  $valeur = filter($_POST['valeur']);
  $UPC = filter($_POST['pc']);
  $nombre = filter($_POST['nbr']);
  $valeurTotal = $valeur * $nombre;
  $PC = $UPC * $nombre;
  $type = filter($_POST['typeElement']);
  if ($nombre == 0) {
    header('location:../../doter.php?id='.$idListe.'&message44=Pas d\'unité ou de véhicule enregistrée.');
  }
  // Bascule en fonction de l'enregistrement du type d'élément de la liste (1 Unite / 0 vehicule)
  if ($type == 0) {
    $requetteSQL = "INSERT INTO `doterListeArmee`( `idListe`,  `id_Vehicule`, `nbr`, `TotalValeur`, `PC`)
    VALUES (:id, :id_Vehicule, :nbr, :TotalValeur, :PC);";
      include '../readDB.php';
      $data->bindParam(':id_Vehicule', $id_Unite);
  } else {
    $requetteSQL = "INSERT INTO `doterListeArmee`(`idListe`, `id_Unite`, `nbr`, `TotalValeur`, `PC`)
    VALUES (:id, :id_Unite, :nbr, :TotalValeur, :PC);";
    include '../readDB.php';
    $data->bindParam(':id_Unite', $id_Unite);
  }
    $data->bindParam(':id', $idListe);
    $data->bindParam(':nbr', $nombre);
    $data->bindParam(':TotalValeur', $valeurTotal);
    $data->bindParam(':PC', $PC);
    $data->execute();
  $requetteSQL = "SELECT SUM(`TotalValeur`) AS `Total` FROM `doterListeArmee` WHERE `idListe` = :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $idListe);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataValeur = $data->fetchAll();
  $newValeur = $dataValeur[0]['Total'];
  $requetteSQL = "UPDATE `listeArmee` SET `valeurListe` =:newValeur WHERE `idListeArmee` = :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $idListe);
  $data->bindParam(':newValeur', $newValeur);
  $data->execute();
// Retour à la page de création de liste choisie.
  header('location:../../doter.php?id='.$idListe);
} else {
  header('location:../../doterListe.php');
}


 ?>
