<?php
if ($weaponSize > 0) {
include 'gestionDB/read/rechercheVforW.php';
} else {
  include 'gestionDB/read/rechercheUforW.php';
}

include 'stockage/yes.php';
include 'stockage/gabarit.php';
 ?>
<table>
  <caption><h3>Affecter une  nouvelle arme</h3></caption>
  <tr>
    <th>Nom Arme</th>
    <th>Type Arme</th>
    <th>Portée (pouces)</th>
    <th>Puissance</th>
    <th>Arme lourde</th>
    <th>Arme d'assaut</th>
    <th>Arme de couverture</th>
    <th>Sort</th>
    <th>Cadence de tir/round</th>
    <th>Arme explosive</th>
    <th>Gabarit d'explosion</th>
    <th>Puissance explosif</th>
    <th>Régle spéciales</th>
    <th>Prix</th>
    <th>Ajouter</th>
  </tr>
<?php
  foreach ($dataWeapon as $key) {
    if ($weaponSize > 0) {
      $newValeur = $key['valeur']*$key['puissance']*(($typeDe[$dataOneV[0]['DC']]['prix'])/5.5) + $dataOneV[0]['valeur'];
    } else {
       $newValeur = $key['valeur']*$key['puissance']*(($typeDe[$dataOneU[0]['DC']]['prix'])/5.5) + $dataOneU[0]['valeurUnite'];
    }
    if ($key['rangeMax'] == 2) {
      $range = ' NA ';
    } else {
      $range = $key['rangeMax'];
    }
    if ($key['explosif'] > 0) {
      $HE = 'Oui';
    } else {
      $HE = 'Non';
    }
 echo '
    <tr>
      <td>'.$key['nomArme'].'</td>
      <td>'.$key['typeDescription'].'</td>
      <td>'.$range.'</td>';

      if ($weaponSize > 0) {
        echo '<td>'.$key['puissance'].$typeDe[$dataOneV[0]['DC']]['de'].'</td>';
      } else {
        echo '<td>'.$key['puissance'].$typeDe[$dataOneU[0]['DC']]['de'].'</td>';
      }


      echo '<td>'.$yes[$key['lourde']]['texte'].'</td>
      <td>'.$yes[$key['assaut']]['texte'].'</td>
      <td>'.$yes[$key['couverture']]['texte'].'</td>
      <td>'.$yes[$key['sort']]['texte'].'</td>
      <td>'.$key['cadence'].'</td>
      <td>'.$HE.'</td>
      <td>'.$gabarit[$key['explosif']]['texte'].'</td>
      <td>'.$explosion[$key['dExplosive']]['texte'].'</td>
      <td>';

$requetteSQL = "SELECT `reglesSpeciales`.`nomRS` FROM `RSArme`
INNER JOIN `reglesSpeciales` ON `RSArme`.`id_RS` = `reglesSpeciales`.`idRS`
WHERE `id_arme` =".$key['idArme'];
$data = $conn->prepare($requetteSQL);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataRS = $data->fetchAll();
  echo '<ul class="listRS">';
foreach ($dataRS as $listing) {

  echo '<li>'.$listing['nomRS'].'</li>';

}
  echo '</ul>';
  if ($weaponSize > 0) {
    echo '</td><td>'.intval($key['valeur']*$key['puissance']*(($typeDe[$dataOneV[0]['DC']]['prix'])/5.5)).'</td>
        <td>
        <form action="gestionDB/record/addDotationVehicule.php" method="post">
               <input type="hidden" name="id_vehicule" value="'.$dataOneV[0]['idVehicule'].'">
               <input type="hidden" name="id_arme" value="'.$key['idArme'].'">
               <input type="hidden" name="newValeurUnite" value="'.$newValeur.'">
               <button class="buttonGestionLore" type="submit" name="button">Doter</button>
             </form>
        </td>
      </tr>';
  } else {
    echo '</td><td>'.intval($key['valeur']*$key['puissance']*(($typeDe[$dataOneU[0]['DC']]['prix'])/5.5)).'</td>
        <td>
        <form action="gestionDB/record/addDotation.php" method="post">
               <input type="hidden" name="id_unite" value="'.$dataOneU[0]['idUnite'].'">
               <input type="hidden" name="id_arme" value="'.$key['idArme'].'">
               <input type="hidden" name="newValeurUnite" value="'.$newValeur.'">
               <button class="buttonGestionLore" type="submit" name="button">Doter</button>
             </form>
        </td>
      </tr>';
  }

  }

 ?>
  </table>
