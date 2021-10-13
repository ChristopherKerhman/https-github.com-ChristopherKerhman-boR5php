<?php
  $requetteSQL = "SELECT `idUser`, `login`, `nom`, `prenom`, `role`, `emailUSer` ,`createur`, `contributeur`, `description`, `consentementUser`, `dateInscription`, `tiper` FROM `users` WHERE `idUser` = :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $idUser);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataProfil = $data->fetchAll();
  $requetteSQL = "SELECT COUNT(`idUnivers`) AS `totalU` FROM `multivers` WHERE `valide` = 1 AND `idAuteur` = :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $idUser);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataNRBU = $data->fetchAll();
  $requetteSQL = "SELECT `idUnivers`, `nomUnivers`, `valide`, `NT` FROM `multivers` WHERE `idAuteur` = :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $idUser);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataUnivers = $data->fetchAll();
 ?>
