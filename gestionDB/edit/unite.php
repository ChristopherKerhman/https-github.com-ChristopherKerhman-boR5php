<?php
$autorisation = 1;
include '../../restriction/session.php';
include '../identifiantDB.php';
include '../controleFormulaires.php';
// Tableau
include '../../stockage/de.php';
include '../../stockage/typeTroupe.php';
include '../../stockage/typeFigurine.php';
include '../../stockage/sauvegarde.php';
include '../../stockage/pointDeVie.php';
// Fin Tableau
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = filter($_POST['idUnite']);
  $nomFigurine = filter($_POST['nomFigurine']);
  $Description = filter_Texte($_POST['Description']);
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
  $valeur = (($typeDe[$DC]['prix'] + $typeDe[$DQM]['prix'] + $valeurMouvement + $typeFigurine[$taille]['prix'] + $typeTroupe[$typeF]['prix']) * $pointDeVie) * $sauvegarde[$svg]['prix'];
  if ($typeF == '6') {
    $niveauMage = filter($_POST['niveauMage']);
    $requetteSQL = "UPDATE `unites` SET `nomFigurine`= :nomFigurine,`Description`= :Description,`typeTroupe`=:typeTroupe,`taille`= :taille,`niveauMage`=:niveauMage,`deplacement`=:deplacement,
    `course`=:course,`vol`=:vol,`station`=:station,`DQM`=:DQM,`DC`=:DC,`sauvegarde`=:sauvegarde,`pointDeVie`=:pdv,`valeurUnite`=:valeur
    WHERE `idUnite`=:id;
    DELETE FROM `unite_armes` WHERE `id_unite` = :id";
    include '../readDB.php';
    $data->bindParam(':niveauMage', $niveauMage);
  } else {
    // Si l'unité n'est pas un mage
    $requetteSQL = "UPDATE `unites` SET `nomFigurine`= :nomFigurine,`Description`= :Description,`typeTroupe`=:typeTroupe,`taille`= :taille,`deplacement`=:deplacement,
    `course`=:course,`vol`=:vol,`station`=:station,`DQM`=:DQM,`DC`=:DC,`sauvegarde`=:sauvegarde,`pointDeVie`=:pdv,`valeurUnite`=:valeur
    WHERE `idUnite`=:id;
    DELETE FROM `unite_armes` WHERE `id_unite` = :id";
      include '../readDB.php';
  }
  $data->bindParam(':id', $id);
  $data->bindParam(':nomFigurine', $nomFigurine);
  $data->bindParam(':Description', $Description);
  $data->bindParam(':typeTroupe', $typeF);
  $data->bindParam(':taille', $taille);
  $data->bindParam(':deplacement', $deplacement);
  $data->bindParam(':course', $course);
  $data->bindParam(':DQM', $DQM);
  $data->bindParam(':DC', $DC);
  $data->bindParam(':sauvegarde', $svg);
  $data->bindParam(':pdv', $pointDeVie);
  $data->bindParam(':vol', $vol);
  $data->bindParam(':station', $station);
  $data->bindParam(':valeur', $valeur);
  $data->execute();
  header('location:../../dotationUnite.php?id='.$id);
} else {
  header('location:../../index.php');
}
 ?>
