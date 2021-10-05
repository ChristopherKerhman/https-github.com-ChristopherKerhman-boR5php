<p class="paragraphe">Fixer ou defixer un véhicule entraine l'effacement de celui-ci dans toute les listes afin de le mettre à jour. La mise a jour du prix des listes se ferra lorsque vous la mettrez à jours.</p>
<?php
include 'stockage/yes.php';
include 'stockage/typeVehicule.php';
include 'stockage/de.php';
if (empty($dataVehicule)) {
  echo 'Pas encore de véhicule disponible.<br />
  <a class="lienNav" href="addVehicule.php"><i class="fab fa-odnoklassniki-square"></i> Creation de véhicule</a>';
} else {
  echo " <table>
     <tr>
       <th>ID</th>
       <th>Nom</th>
      <th>Decription</th>
       <th>Type</th>
       <th>Volant</th>
       <th>Vol stationnaire</th>
       <th>Mouvement tactique</th>
       <th>Course</th>
       <th>Membres d'équipage</th>
       <th>Passagers</th>
       <th>DQM</th>
       <th>DC</th>
       <th>Blindage</th>
       <th>Point de structure</th>
       <th>Prix</th>
       <th>Fixer</th>
       <th>Dotation</th>
       <th>Modifier</th>
       <th>Effacer</th>
     </tr>";
foreach ($dataVehicule as $key) {
  echo
  '<tr>
  <td>'.$key['idVehicule'].'</td>
  <td>'.$key['nomVehicule'].'</td>
  <td><a class="lienInfo" title="'.$key['descriptionVehicule'].'">  En savoir plus ?</a></td>
  <td>'.$typeVehicule[$key['typeVehicule']]['type'].'</td>
  <td>'.$yes[$key['vol']]['texte'].'</td>
  <td>'.$yes[$key['stationnaire']]['texte'].'</td>
  <td>'.$key['mouvementVehicule'].'</td>
  <td>'.$key['courseVehicule'].'</td>
  <td>'.$equipage[$key['equipage']]['equipage'].'</td>
  <td>'.$passager[$key['passager']]['nbr'].'</td>
  <td>'.$typeDe[$key['DQM']]['de'].'</td>
  <td>'.$typeDe[$key['DC']]['de'].'</td>
  <td>'.$blindage[$key['svg']]['type'].' - '.$blindage[$key['svg']]['svg'].'</td>
  <td>'.$structure[$key['pointStructure']]['ps'].'</td>
  <td>'.round($key['valeur'], 0).'</td>';
  if (intval($key['fixer']) > 0) {
    echo '<td id="center"><form action="gestionDB/edit/fixeVehicule.php" method="post">
     <input type="hidden" name="idVehicule" value="'.$key['idVehicule'].'">
    <input type="hidden" name="fixer" value="0">
    <button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-tint-slash"></i></button></form>
    <td colspan="3"><i class="fas fa-exclamation-triangle doublesize"></i></td>
    </tr>';
  } else {
    echo '<td id="center">
    <form action="gestionDB/edit/fixeVehicule.php" method="post">
    <input type="hidden" name="idVehicule" value="'.$key['idVehicule'].'">
    <input type="hidden" name="fixer" value="1"><button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-tint"></i></button>
    </form></td>
    <td><a class="lienNav" href="dotationVehicule.php?id='.$key['idVehicule'].'">Dotation</a></td>
    <td><a class="lienNav" href="modifierVehicule.php?id='.$key['idVehicule'].'">Modifier</a></td>
    <td>
    <form action="gestionDB/del/vehicule.php" method="post">
     <input type="hidden" name="idUnite" value="'.$key['idVehicule'].'">
     <button class="buttonGestionLore marge" type="submit" name="button">effacer</button>
    </form>
    </td>
    </tr>';
  }




}
  echo "</table>";
}

 ?>
