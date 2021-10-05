<p class="paragraphe">Fixer ou defixer une unité entraine l'effacement de celui-ci dans toute les listes afin de le mettre à jour. La mise a jour du prix des listes se ferra lorsque vous la mettrez à jours.</p>
<?php
include 'stockage/yes.php';
if (empty($dataUnite)) {
  echo 'Pas encore d\'unité dans ce camps <br /><br />
  <a class="lienNav" href="nouvelleUnite.php"><i class="fab fa-odnoklassniki-square"></i> Creation d\'unité</a>';
} else {
  echo '<table>
    <tr>
      <th>Nom</th>
      <th>Description</th>
      <th>Dé de combat</th>
      <th>Dé de qualité martial</th>
      <th>Taille</th>
      <th>Troupe</th>
      <th>Niveau Mage</th>
      <th>Mouvement Tactique</th>
      <th>Course</th>
      <th>Vol</th>
      <th>Vol stationnaire</th>
      <th>Point de vie</th>
      <th>Sauvegarde</th>
      <th>Prix</th>
      <th>Fixer</th>
      <th>Dotation</th>
      <th>Modifier</th>
      <th>Effacer</th>
    </tr>';
foreach ($dataUnite as $key) {
  echo '<tr>
    <td>'.$key['nomFigurine'].'</td>
    <td><a class="lienInfo" title="'.$key['Description'].'">  En savoir plus ?</a></td>
    <td>'.$typeDe[$key['DC']]['de'].'</td>
    <td>'.$typeDe[$key['DQM']]['de'].'</td>
    <td>'.$typeFigurine[$key['taille']]['taille'].'</td>
    <td>'.$typeTroupe[$key['typeTroupe']]['troupe'].'</td>
    <td>'.$key['niveauMage'].'</td>
    <td>'.$key['deplacement'].' pouces</td>
    <td>'.$key['course'].' pouces</td>
    <td>'.$yes[$key['vol']]['texte'].'</td>
    <td>'.$yes[$key['station']]['texte'].'</td>
    <td>'.$pdv[$key['pointDeVie']]['pdv'].'</td>
    <td>'.$sauvegarde[$key['sauvegarde']]['Type'].' - '.$sauvegarde[$key['sauvegarde']]['message'].'</td>
    <td>'.round($key['valeurUnite'], 0).'</td>';
     if (intval($key['fixer']) > 0) {
       echo '<td id="center"><form action="gestionDB/edit/fixeUnite.php" method="post">
        <input type="hidden" name="idUnite" value="'.$key['idUnite'].'">
       <input type="hidden" name="fixer" value="0"><button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-tint-slash"></i></button></form>
       <td colspan="3"><i class="fas fa-exclamation-triangle doublesize"></i></td>
       </tr>';
     } else {
        echo '<td id="center">
        <form action="gestionDB/edit/fixeUnite.php" method="post">
        <input type="hidden" name="idUnite" value="'.$key['idUnite'].'">
        <input type="hidden" name="fixer" value="1"><button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-tint"></i></button>
        </form></td>
       <td><a class="lienNav" href="dotationUnite.php?id='.$key['idUnite'].'">Dotation</a></td>
       <td><a class="lienNav" href="modifUnite.php?id='.$key['idUnite'].'">Modifier</a></td>
       <td><form action="gestionDB/del/unite.php" method="post">
        <input type="hidden" name="idUnite" value="'.$key['idUnite'].'">
        <button class="buttonGestionLore" type="submit" name="button">effacer</button>
       </form></td>
       </tr>';
     }
}
echo '</table>';
}
 ?>
