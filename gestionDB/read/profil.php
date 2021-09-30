<?php
  $requetteSQL = "SELECT `idUser`, `login`, `nom`, `prenom`, `role`, `emailUSer` ,`createur`, `contributeur`, `description`, `consentementUser`, `dateInscription` FROM `users` WHERE `idUser` = :id";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $_SESSION['idUser']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataProfil = $data->fetchAll();
 ?>
