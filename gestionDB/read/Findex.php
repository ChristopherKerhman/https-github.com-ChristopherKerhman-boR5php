<?php
// Read Univers pour Findex.php
$requetteSQL = "SELECT `idUnivers`, `nomUnivers`, `NT`, `login`
FROM `multivers`
INNER JOIN `users` ON `idAuteur` =  `idUser`
WHERE `valide` = 1
ORDER BY `nomUnivers` ASC";
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUnivers = $data->fetchAll();
// Read RS pour Findex.php
$requetteSQL = "SELECT `idRS`, `nomRS`, `descriptionRS`
FROM `reglesSpeciales`
WHERE `valide` = 1";
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataRS = $data->fetchAll();
 ?>
