<?php
$autorisation = 1;
// Ajout des Tableaux
include '../../stockage/de.php';
include '../../stockage/typeTroupe.php';
include '../../stockage/typeFigurine.php';
include '../../stockage/sauvegarde.php';
include '../../stockage/pointDeVie.php';
//Fin des tableaux
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
checkemptyData($_POST['nomfigurine']);
$nomFigurine = filter($_POST['nomFigurine']);
checkemptyData($_POST['Description']);
$Description = filter_Texte($_POST['Description']);
$id_faction = filter($_POST['id_faction']);
if (empty($_POST['id_faction'])) {
header('location:../../index.php');
}
$idP = filter($_POST['idP']);
$DC = filter($_POST['DC']);
$DQM = filter($_POST['DQM']);
$typeF = filter($_POST['typeTroupe']);
$taille = filter($_POST['taille']);
$deplacement = filter($_POST['deplacement']);
$course = filter($_POST['course']);
$pointDeVie = filter($_POST['pointDeVie']);
$svg = filter($_POST['sauvegarde']);
$vol = filter($_POST['vol']);
$station = filter($_POST['station']);
$valeurMouvement = log($deplacement) + $vol + $station;
$valeur = (($typeDe[$DC]['prix'] + $typeDe[$DQM]['prix'] + $valeurMouvement + $typeFigurine[$taille]['prix'] + $typeTroupe[$typeF]['prix']) * ($pointDeVie + 2)) * $sauvegarde[$svg]['prix'];
// Si c'est un mage
if ($typeF == '6') {
  $niveauMage = filter($_POST['niveauMage']);
  $valeur = (($typeDe[$DC]['prix'] + $typeDe[$DQM]['prix'] + $valeurMouvement + $typeFigurine[$taille]['prix'] + $typeTroupe[$typeF]['prix'] + $niveauMage) * ($pointDeVie + 2)) * $sauvegarde[$svg]['prix'];
  $requetteSQL = "INSERT INTO `unites`(`idP`, `id_faction`, `nomFigurine`, `Description`, `typeTroupe`, `taille`, `niveauMage`, `deplacement`, `course`, `DQM`, `DC`, `sauvegarde`, `pointDeVie`, `vol`, `station`, `valeurUnite`)
  VALUES (:idP, :id_faction, :nomFigurine, :Description, :typeTroupe, :taille, :niveauMage, :deplacement, :course, :DQM, :DC, :sauvegarde, :pointDeVie, :vol, :station, :valeur)";
  include '../readDB.php';
  $data->bindParam(':niveauMage', $niveauMage);
} else {
  // Si l'unité n'est pas un mage
  $requetteSQL = "INSERT INTO `unites`(`idP`, `id_faction`, `nomFigurine`, `Description`, `typeTroupe`, `taille`, `deplacement`, `course`, `DQM`, `DC`, `sauvegarde`, `pointDeVie`, `vol`, `station`, `valeurUnite`)
  VALUES (:idP, :id_faction, :nomFigurine, :Description, :typeTroupe, :taille, :deplacement, :course, :DQM, :DC, :sauvegarde, :pointDeVie, :vol, :station, :valeur)";
    include '../readDB.php';
}
$data->bindParam(':idP', $idP);
$data->bindParam(':id_faction', $id_faction);
$data->bindParam(':nomFigurine', $nomFigurine);
$data->bindParam(':Description', $Description);
$data->bindParam(':typeTroupe', $typeF);
$data->bindParam(':taille', $taille);
$data->bindParam(':deplacement', $deplacement);
$data->bindParam(':course', $course);
$data->bindParam(':DQM', $DQM);
$data->bindParam(':DC', $DC);
$data->bindParam(':sauvegarde', $svg);
$data->bindParam(':pointDeVie', $pointDeVie);
$data->bindParam(':vol', $vol);
$data->bindParam(':station', $station);
$data->bindParam(':valeur', $valeur);
$data->execute();
header('location:../../troupes.php');
} else {
header('location:../../index.php');
}
 ?>
