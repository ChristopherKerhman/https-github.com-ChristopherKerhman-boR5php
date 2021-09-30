<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if (($_SERVER['REQUEST_METHOD'] === 'POST') && (!empty($_POST['nomArme'])) &&(!empty($_POST['descriptionArme']))) {
  checkemptyData($_POST['nomArme']);
  if (empty($_POST['idMultivers'])) {
  header('location:../../index.php');
  }
  $vehicule = filter($_POST['armeVehicule']);
  $idMultivers = filter($_POST['idMultivers']);
  $nomArme = filter($_POST['nomArme']);
  $descriptionArme = filter($_POST['descriptionArme']);
  $puissance = filter($_POST['puissance']);
  $sort = filter($_POST['sort']);
  $type = 1;
  $rangeMax = 2;
  $idCreateur = filter($_POST['idCreateur']);
  $valeur = (log($rangeMax) + $puissance) + ($sort * 1.5) + ($vehicule * 2);
  $requetteSQL = "INSERT INTO `armes`(`nomArme`, `descriptionArme`, `rangeMax`, `puissance`, `type`, `idCreateur`, `idUnivers`, `valeur`, `sort`, `armeVehicule`)
  VALUES (:nomArme, :descriptionArme, :rangeMax, :puissance, :type, :idCreateur, :idUnivers, :valeur, :sort, :vehicule)";
  include '../readDB.php';
  $data->bindParam(':nomArme', $nomArme);
  $data->bindParam(':descriptionArme', $descriptionArme);
  $data->bindParam(':rangeMax', $rangeMax);
  $data->bindParam(':puissance', $puissance);
  $data->bindParam(':sort', $sort);
  $data->bindParam(':vehicule', $vehicule);
  $data->bindParam(':type', $type);
  $data->bindParam(':idCreateur', $idCreateur);
  $data->bindParam(':idUnivers', $idMultivers);
  $data->bindParam(':valeur', $valeur);
  $data->execute();
  header('location:../../createWeapon.php');
} else {
  header('location:../../index.php');
}

 ?>
