<?php
include 'Fheader.php';
include 'gestionDB/read/Findex.php';
$_SESSION['idUniversVisite'] = NULL;
$_SESSION['nomUnivers'] = NULL;
$requetteSQL = "SELECT `idUser`, `login`, `tiper` FROM `users` WHERE `consentementUser`= 1 AND `role` = 1 ORDER BY `login` ASC";
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataUser = $data->fetchAll();
//print_r($dataUser);
?>
<section>
  <?php
    $arrayLogin = [];
    $arrayScore = [];

  foreach ($dataUser as $key) {
    $score = 0;
    if ($key['tiper'] == 1) {
      $requetteSQL = "SELECT COUNT(`tiper`) AS `total` FROM `users` WHERE `tiper` = 1";
      $data = $conn->prepare($requetteSQL);
      $data->bindParam(':id', $key['idUser']);
      $data->execute();
      $data->setFetchMode(PDO::FETCH_ASSOC);
      $data = $data->fetchAll();
      $score = $data[0]['total'];
    }
    // Score Univers
    $requetteSQL = "SELECT COUNT(`nomUnivers`) AS `total` FROM `multivers` WHERE `idAuteur` = :id";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $key['idUser']);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $data = $data->fetchAll();
    $score = $score + $data[0]['total'];
    // Score texte de Lore
    $requetteSQL = "SELECT COUNT(`idLore`) AS `total` FROM `lore` WHERE `idAuteur` = :id";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $key['idUser']);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $data = $data->fetchAll();
    $score = $score + ($data[0]['total']) * 0.5;
    // Score Faction
    $requetteSQL = "SELECT COUNT(`idFaction`) AS `total` FROM `factions` WHERE `id_proprietaire` = :id";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $key['idUser']);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $data = $data->fetchAll();
    $score = $score + ($data[0]['total']) * 0.1;
    // Score Arme
    $requetteSQL = "SELECT COUNT(`idArme`) AS `total` FROM `armes` WHERE `idCreateur` = :id AND `verrou` = 1";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $key['idUser']);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $data = $data->fetchAll();
    $score = $score + ($data[0]['total']) * 0.15;
    // Score Unité
    $requetteSQL = "SELECT COUNT(`idUnite`) AS `total` FROM `unites` WHERE `idP` = :id AND `fixer` = 1";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $key['idUser']);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $data = $data->fetchAll();
    $score = $score + ($data[0]['total']) * 0.25;
    // Score Véhicule
    $requetteSQL = "SELECT COUNT(`idVehicule`) AS `total` FROM `vehicule` WHERE `id_proprietaire` = :id AND `fixer` = 1";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $key['idUser']);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $data = $data->fetchAll();
    $score = $score + ($data[0]['total']) * 0.25;
    // Score listes partagés
    $requetteSQL = "SELECT COUNT(`idListeArmee`) AS `total` FROM `listeArmee` WHERE `proprietaire` = :id  AND `fixerListe` = 1";
    $data = $conn->prepare($requetteSQL);
    $data->bindParam(':id', $key['idUser']);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $data = $data->fetchAll();
    $score = $score + ($data[0]['total']) * 1;
  $arrayScore[] = $score;
  $arrayLogin[] = $key['login'];
  }
$tableau = array_combine($arrayLogin, $arrayScore);
//print_r($tableau);
   ?>
<table>
  <caption>
    <strong class="famous">Le tableau des meilleurs créateurs</strong>
  </caption>
  <tr>
    <th><strong class="famous">Speudo</strong></th>
    <th><strong class="famous">Score</strong></th>
  </tr>

  <?php
  arsort($tableau, $flag = SORT_NUMERIC);
  foreach ($tableau as $key => $value) {
    echo '<tr>
    <td><strong class="famous">'.$key.'</strong></td>
    <td><strong class="famous">'.$value.'</strong></td>
    </tr> ';
  }
   ?>
</table>
</section>

<?php
  include 'footer.php';
?>
