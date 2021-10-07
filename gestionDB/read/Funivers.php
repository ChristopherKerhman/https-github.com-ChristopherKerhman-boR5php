<?php
$requetteSQL = "SELECT `idUnivers`, `nomUnivers`, `NT`, `login`
FROM `multivers`
INNER JOIN `users` ON `idAuteur` =  `idUser`
WHERE `valide` = 1
ORDER BY `nomUnivers` ASC";
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUnivers = $data->fetchAll();

 ?>
