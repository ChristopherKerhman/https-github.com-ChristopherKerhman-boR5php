<?php
$requetteSQL = "SELECT `RSArme`.`id_arme`, `RSArme`.`idARS`, `reglesSpeciales`.`nomRS`, `reglesSpeciales`.`valeurRS` FROM `RSArme` INNER JOIN `reglesSpeciales` WHERE `RSArme`.`id_RS` = `reglesSpeciales`.`idRS` AND `id_arme`= :id";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $key['idArme']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataRS = $data->fetchAll();
 ?>
