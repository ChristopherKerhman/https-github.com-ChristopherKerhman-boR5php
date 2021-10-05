<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $idListe = filter($_POST['idListe']);
  $id_Unite = filter($_POST['id_Unite']);
  $valeur = filter($_POST['valeur']);
  $nombre = filter($_POST['nbr']);
  $type = filter($_POST['typeElement']);
  if ($nombre == 0) {
    header('location:../../doter.php?id='.$idListe.'&message44=Pas d\'unité ou de véhicule enregistrée.');
  }
  // Récupération de la valeur de la liste
  $requetteSQL = "SELECT `valeurListe` FROM `listeArmee` WHERE `idListeArmee` = :id AND `valide` = 1";
  include '../readDB.php';
  $data->bindParam(':id', $idListe);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  if (!empty($dataTraiter)) {
    $valeurListeTotal = $dataTraiter[0]['valeurListe'];
    $valeurTotalListe = ($valeur * $nombre) + $valeurListeTotal;
  } else {
      header('location:../../doterListe.php');
  }
  // Bascule en fonction de l'enregistrement du type d'élément de la liste (1 Unite / 0 vehicule)
  if ($type == 0) {
    $requetteSQL = "INSERT INTO `doterListeArmee`( `idListe`,  `id_Vehicule`, `nbr`, `TotalValeur`)
    VALUES (:id, :id_Vehicule, :nbr, :TotalValeur);
    UPDATE `listeArmee` SET `valeurListe`= :valeurTotalListe WHERE `idListeArmee` = :id";
    $valeurTotal = $valeur * $nombre;
      $data = $conn->prepare($requetteSQL);
      $data->bindParam(':id_Vehicule', $id_Unite);
  } else {
    $requetteSQL = "INSERT INTO `doterListeArmee`(`idListe`, `id_Unite`, `nbr`, `TotalValeur`)
    VALUES (:id, :id_Unite, :nbr, :TotalValeur);
    UPDATE `listeArmee` SET `valeurListe`= :valeurTotalListe WHERE `idListeArmee` = :id";
    $valeurTotal = $valeur * $nombre;
      $data = $conn->prepare($requetteSQL);
      $data->bindParam(':id_Unite', $id_Unite);
  }
    $data->bindParam(':id', $idListe);
    $data->bindParam(':nbr', $nombre);
    $data->bindParam(':TotalValeur', $valeurTotal);
    $data->bindParam(':valeurTotalListe', $valeurTotalListe);
    $data->execute();
// Retour à la page de création de liste choisie.
  header('location:../../doter.php?id='.$idListe);
} else {
  header('location:../../doterListe.php');
}


 ?>
