<?php
include 'gestionDB/read/readWeaponOnce.php';
include 'stockage/yes.php';
include 'stockage/gabarit.php';
// donnée de sortie :  $dataWeapon
function yes($data) {
  if ($data == 1) {
    $data = 'Oui';
  } else {
    $data = 'non';
  }
  return $data;
}
 ?>
 <table>
   <caption><h3>Profil complet de l'arme</h3></caption>
   <tr>
     <th>Nom Arme</th>
     <th>Description</th>
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
     <th>Prix brute</th>
     <th>Verouille</th>
   </tr>
   <tr>
     <td><?php echo $dataWeapon[0]['nomArme']; ?></td>
     <td><?php echo $dataWeapon[0]['descriptionArme']; ?></td>
     <td><?php echo $dataWeapon[0]['typeDescription']; ?></td>
     <td><?php
     if ($dataWeapon[0]['rangeMax'] <= 2) {
       echo 'NA';
     } else {
       echo $dataWeapon[0]['rangeMax'];
     }
     ?></td>
     <td><?php echo $dataWeapon[0]['puissance']; ?>D</td>
     <td><?php echo $yes[$dataWeapon[0]['lourde']]['texte']; ?></td>
     <td><?php echo $yes[$dataWeapon[0]['assaut']]['texte']; ?></td>
     <td><?php echo $yes[$dataWeapon[0]['couverture']]['texte']; ?></td>
     <td><?php echo $yes[$dataWeapon[0]['sort']]['texte']; ?></td>
     <td><?php echo $dataWeapon[0]['cadence']; ?></td>
     <td><?php if ($dataWeapon[0]['explosif'] > 0) { echo 'Oui'; } else { echo 'Non';} ?></td>
     <td><?php echo $gabarit[$dataWeapon[0]['explosif']]['texte']; ?></td>
    <td><?php echo $explosion[$dataWeapon[0]['dExplosive']]['texte']; ?></td>
    <td><?php
    $requetteSQL = "SELECT `reglesSpeciales`.`nomRS` FROM `RSArme`
    INNER JOIN `reglesSpeciales` ON `RSArme`.`id_RS` = `reglesSpeciales`.`idRS`
    WHERE `id_arme` =".$dataWeapon[0]['idArme'];
    $data = $conn->prepare($requetteSQL);
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataRS = $data->fetchAll();
    if(!empty($dataRS)) {
      echo '<ul class="listRS">';
    foreach ($dataRS as $listing) {
      echo '<li>'.$listing['nomRS'].'</li>';
    }
    echo '</ul>';
  } else {
    echo 'Pas de règles spéciales';
  }

     ?></td>
    <td><?php echo intval($dataWeapon[0]['valeur']); ?></td>
    <td><?php echo $yes[$dataWeapon[0]['verrou']]['texte'] ?></td>
   </tr>
 </table>
<h3>Les règles spécial déjà affecté à cette arme</h3>
<?php
include 'gestionDB/read/readRSWOnce.php';
//Donnée de stockage  $dataRS
echo '<ul class="listSimple">';
foreach ($dataRS as $key) {
  echo '<li>'.$key['nomRS'].'
          <form  action="gestionDB/del/delRSW.php" method="post">
          <input type="hidden" name="id_arme" value="'.$key['id_arme'].'" />
          <input type="hidden" name="idARS" value="'.$key['idARS'].'" />
          <input type="hidden" name="valeur" value="'.$key['valeurRS'].'" />
          <button class="buttonGestionLore" type="submit" name="button">Effacer</button>
          </form>
        </li>';
}
echo '</ul>';
 ?>
