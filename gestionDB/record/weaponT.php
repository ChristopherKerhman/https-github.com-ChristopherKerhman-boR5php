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
  $type = 2;
  $rangeMax = filter($_POST['rangeMax']);
  $lourde = filter($_POST['lourde']);
  $assaut = filter($_POST['assaut']);
  $couverture = filter($_POST['couverture']);
  $cadence = filter($_POST['cadence']);
  $idCreateur = filter($_POST['idCreateur']);
  $valeur = $valeur = (log($rangeMax) + $puissance) + ($sort * 1.5) + ($lourde * 3) + ($assaut *1.5) + ($couverture * $cadence) + ($vehicule * 5);
  $requetteSQL = "INSERT INTO `armes`(`nomArme`, `descriptionArme`, `rangeMax`, `puissance`, `type`, `idCreateur`, `idUnivers`, `valeur`, `sort`, `lourde`, `assaut`, `couverture`, `cadence`, `armeVehicule`)
  VALUES (:nomArme, :descriptionArme, :rangeMax, :puissance, :type, :idCreateur, :idUnivers, :valeur, :sort, :lourde, :assaut, :couverture, :cadence, :vehicule)";
  include '../readDB.php';
  $data->bindParam(':nomArme', $nomArme);
  $data->bindParam(':descriptionArme', $descriptionArme);
  $data->bindParam(':rangeMax', $rangeMax);
  $data->bindParam(':puissance', $puissance);
  $data->bindParam(':type', $type);
  $data->bindParam(':idCreateur', $idCreateur);
  $data->bindParam(':idUnivers', $idMultivers);
  $data->bindParam(':valeur', $valeur);
  $data->bindParam(':sort', $sort);
  $data->bindParam(':lourde', $lourde);
  $data->bindParam(':assaut', $assaut);
  $data->bindParam(':couverture', $couverture);
  $data->bindParam(':cadence', $cadence);
  $data->bindParam(':vehicule', $vehicule);
  $data->execute();
  header('location:../../createWeapon.php');
} else {
  header('location:../../index.php');
}
 ?>
