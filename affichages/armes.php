<div class="conteneur_row">
  <i class="fas fa-exclamation-triangle doublesize"></i><p class="paragraphe center">
    Seul les arme verrouiller peuvent être utiliser pour équiper une unité.<br />
    Verrouiller une arme est définitif.<br />
    Vous ne pourrez plus la retoucher.
  </p> <i class="fas fa-exclamation-triangle doublesize"></i>
</div>
<?php
include 'stockage/gabarit.php';
include 'stockage/yes.php';
if (!empty($dataWeapon)) {
echo
  "<table>
  <tr>
  <th>id</th>
  <th>Nom</th>
  <th>Portée(inch)</th>
  <th>Portée(cm)</th>
  <th>Puissance</th>
  <th>Arme lourde</th>
  <th>Montage Vehicule</th>
  <th>Arme d'assaut</th>
  <th>Arme de couverture</th>
  <th>Cadence de tir</th>
  <th>Gabarit d'explosion</th>
  <th>Puissance de l'explosion</th>
  <th>Sort</th>
  <th>Valeur</th>
  <th>Ajouter une régle spécial</th>
  <th>Supprimer l'arme</th>
  <th>Verrouillage</th>
  </tr>";
}
if (!empty($dataWeapon)) {
  foreach ($dataWeapon as $key) {
    // Lecture des règles spécial affecter à 1 arme
    include 'gestionDB/read/rsGestion.php';
    // Fin de la lecture
    $dataDe = array('1D', '2D', '3D', '4D', '5D');

    if ($key['rangeMax'] == 2) {
      $range = 'Arme de close';
      $rangeCm = $range;
    } else {
      $range = $key['rangeMax'];
      $rangeCm = intval($key['rangeMax'] * 2.54);
    }
  if ($key['cadence'] === NULL) {
      $cadence = '-';
    } else {
      $cadence = $key['cadence'];
    }
  echo '<tr>
          <td>'.$key['idArme'].'</td>
          <td>'.$key['nomArme'].'</td>
          <td>'.$range.'</td>
          <td>'.$rangeCm.'</td>
          <td>'.$dataDe[$key['puissance']-1].'</td>
          <td>'.$yes[$key['armeVehicule']]['texte'].'</td>
          <td>'.$yes[$key['lourde']]['texte'].'</td>
          <td>'.$yes[$key['assaut']]['texte'].'</td>
          <td>'.$yes[$key['couverture']]['texte'].'</td>
          <td>'.$cadence.'</td>
          <td>'.$gabarit[$key['explosif']]['texte'].'</td>
          <td>'.$explosion[$key['dExplosive']]['texte'].'</td>
          <td>'.$yes[$key['sort']]['texte'].'</td>
          <td>'.intval($key['valeur']).'</td>
          <td>';
          if ($key['verrou'] == 0) {
             echo '<a class="aButton" href="addRS.php?idArme='.$key['idArme'].'"><button class="buttonGestionLore" type="button" name="button">Ajouter règle spéciale</button></a>';
          } else {
            echo '<i class="fas fa-exclamation-triangle doublesize"></i> Arme verrouiller';
          }
          echo '</td>
          <td><form  action="gestionDB/del/weapon.php" method="post">
            <input type="hidden" name="idArme" value="'.$key['idArme'].'">
             <button class="buttonGestionLore" type="submit" name="button">Effacer</button>
          </form></td>';
          if ($key['verrou'] == 0) {
            echo '<td><form  action="gestionDB/edit/verrouWeapon.php" method="post">
              <input type="hidden" name="verrou" value="1" />
              <input type="hidden" name="idArme" value="'.$key['idArme'].'">
               <button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-tint"></i></button>
            </form></td>';
          } else {
              echo '<td>
              Verrouillage confirmé
              </td>';
          }

        echo '</tr>';
        echo '<tr><td colspan="17">( ';
        foreach ($dataRS as $index) {
          echo $index['nomRS'].' ';
          }
        echo ' )</td></tr>';
  }
}
if(!empty($dataWeapon)) {
  echo '</table>';
}
 ?>
