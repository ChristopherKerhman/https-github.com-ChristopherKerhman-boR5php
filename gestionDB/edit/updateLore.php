<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titre = filter($_POST['titreLore']);
  $article = filter_Texte($_POST['articleLore']);
  $levelP = filter($_POST['niveauPublication']);
  $id = filter($_POST['id']);
  $requetteSQL = "UPDATE `lore` SET `titreLore`= :titre,`articleLore`= :article,`niveauPublication`=:levelP WHERE `idLore` = :id";
  include '../readDB.php';
  $data->bindParam(':titre', $titre);
  $data->bindParam(':article', $article);
  $data->bindParam(':levelP', $levelP);
  $data->bindParam(':id', $id);
  $data->execute();
  header('location:../../updateLore.php?id='.$id.'');
} else {
  header('location:../../updateLore.php?id='.$id.'');
}
 ?>
