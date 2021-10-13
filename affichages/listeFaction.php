<table>
  <tr>
    <th>id faction</th>
    <th>Univers</th>
    <th>Nom faction</th>
    <th>Changer faction</th>
    <th>Modifier</th>
    <th>Effacer</th>
  </tr>
<?php
include 'gestionDB/read/factions.php';
// variable de sortie : $dataFaction
foreach ($dataFaction as $key) {
  echo '<tr>
    <td>'.$key['idFaction'].'</td>
    <td>'.$key['nomUnivers'].'</td>
    <td>'.$key['nomFaction'].'</td>
    <form action="gestionDB/edit/faction.php" method="post">
    <input type="hidden" name="idFaction" value="'.$key['idFaction'].'">
    <td><input class="sizeInpute" type="text" name="nomFaction" value="'.$key['nomFaction'].'" size="20"></td>
    <td><button class="buttonGestionLore" type="submit" name="button">modifier</button></td></form>
    <form action="gestionDB/del/faction.php" method="post">
    <input type="hidden" name="idFaction" value="'.$key['idFaction'].'">
    <td><button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-trash-alt"></i></button></td></form>
  </tr>';
}
 ?>
</table>
