<?php
if ($mage == 0) {
  $requetteSQL = "SELECT `idUnite`, `nomFigurine`, `Description`, `typeTroupe`, `taille`, `niveauMage`, `deplacement`, `course`, `vol`, `station`,
  `DQM`, `DC`, `sauvegarde`, `pointDeVie`, `valeurUnite`, `id_faction`, `fixer`
  FROM `unites`
  WHERE `id_faction` = :id";
} else {
  $requetteSQL = "SELECT `idUnite`, `nomFigurine`, `Description`, `typeTroupe`, `taille`, `niveauMage`, `deplacement`, `course`, `vol`, `station`,
  `DQM`, `DC`, `sauvegarde`, `pointDeVie`, `valeurUnite`, `id_faction`, `fixer`
  FROM `unites`
  WHERE `id_faction` = :id AND `niveauMage` > 0";
}
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $id_faction);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUnite = $data->fetchAll();
 ?>
