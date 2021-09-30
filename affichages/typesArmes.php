<?php
include 'gestionDB/identifiantDB.php';
$requetteSQL = "SELECT `idTypeArme`, `typeDescription`, `valide` FROM `typeArme`";
include 'gestionDB/readDB.php';
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataTraiter = $data->fetchAll();
 ?>
<table>
  <tr>
    <th>Id</th>
    <th>Type</th>
    <th>Valide ?</th>
  </tr>
<?php
foreach ($dataTraiter as $key) {
  if ($key['valide'] == 1) {
    $valide = 'Valide';
  } else {
    $valide = 'Non valide';
  }
  echo '<tr>
          <td>'.$key['idTypeArme'].'</td>
          <td>'.$key['typeDescription'].'</td>
          <td>'.$valide.'</td>
        </tr>';
}
 ?>
</table>
