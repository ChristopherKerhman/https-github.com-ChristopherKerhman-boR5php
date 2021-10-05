<div class="boxePresentation">
<?php
include 'stockage/typeVehicule.php';
include 'stockage/de.php';
include 'stockage/gabarit.php';
foreach ($dataOneV as $key) {

echo '<h3>Nom de véhicule : '.$key['nomVehicule'].'</h3>';
echo '<ul class="listeVehicule">
<li><strong>Faction du véhicule:</strong> '.$key['nomFaction'].'</li>
<li><strong>Type:</strong> '.$typeVehicule[$key['typeVehicule']]['type'].' <strong>Blindage:</strong> '.$blindage[$key['svg']]['type'].'  </li>
<li><strong>DQM: </strong> '.$typeDe[$key['DQM']]['de'].' <strong>DC: </strong> '.$typeDe[$key['DC']]['de'].'</li>
<li><strong>Mouvement tactique:</strong> '.$key['mouvementVehicule'].' "/ '.$key['courseVehicule'].'" + 1D4"</li>
<li><strong>Mouvement tactique:</strong> '.round($key['mouvementVehicule'] * 2,54, 0).' cm/ '.round($key['courseVehicule'] * 2.54, 0).' cm + 2D4 cm</li>
<li><strong>Equipage:</strong> '.$equipage[$key['equipage']]['equipage'].' <strong>Passager:</strong> '.$passager[$key['passager']]['nbr'].'</li>

<li><strong>Point de structure:</strong> '.$structure[$key['pointStructure']]['ps'].' <strong>Sauvegarde:</strong> '.$blindage[$key['svg']]['svg'].'</li>
<li><strong>Prix:</strong> '.round($key['valeur'], 0).' points</li>
</ul>
<p class="paragrapheVehicule"><strong>Description :</strong><br />'.$key['descriptionVehicule'].'</p>
';
}
include 'gestionDB/read/dotationVehicule.php';
foreach ($dataDotationVehicule as $key) {
  $newValeur = $dataOneV[0]['valeur'] - $key['valeur']*$key['puissance']*(($typeDe[$dataOneV[0]['DC']]['prix'])/5.5);
  if ($key['type'] == 1) {
    $type = 'Arme de contact';
    echo '<ul class="listeVehicule">
    <li class="conteneur_row"><strong>'.$type.'</strong>&thinsp;-&thinsp;<strong>Nom de l\'arme:</strong>&thinsp;'.$key['nomArme'].'&thinsp;
    <strong>Puissance:</strong>  &thinsp;'.$key['puissance'].$typeDe[$dataOneV[0]['DC']]['de'].'
    ';
    if ($key['sort'] == 1) {echo '- sort -';}
  }
  if ($key['type'] == 2) {
    $type = 'Arme de tir';
    echo '<ul class="listeVehicule">
    <li class="conteneur_row"><strong>'.$type.'</strong>&thinsp;-&thinsp;<strong>Nom de l\'arme:</strong>&thinsp;'.$key['nomArme'].'&thinsp;
    <strong>Puissance:</strong>  &thinsp;'.$key['puissance'].$typeDe[$dataOneV[0]['DC']]['de'].'
    ';
    if ($key['sort'] == 1) {echo '- sort -';}
    if ($key['lourde'] == 1) {echo '- Arme Lourde';}
    if ($key['assaut'] == 1) {echo '- assaut';}
    if ($key['couverture'] == 1) {echo '- Couverture - Cadence de tir = '.$key['cadence'];}
    if ($key['sort'] == 1) {echo ', - sort';}

    echo ' / <strong>Valeur de l\'arme pour la figurine:</strong> &thinsp;'.intval($key['valeur']*$key['puissance']*(($typeDe[$dataOneV[0]['DC']]['prix'])/5.5)).' points
    &thinsp;
    </li>';
  }
  if ($key['type'] == 3) {
    $type = 'Arme explosive';
    echo '<ul class="listeVehicule">
    <li class="conteneur_row"><strong>'.$type.'</strong>&thinsp;-&thinsp;<strong>Nom de l\'arme:</strong>&thinsp;'.$key['nomArme'].'&thinsp;
    <strong>Puissance:</strong>  &thinsp;'.$key['puissance'].$typeDe[$dataOneV[0]['DC']]['de'].'
    ';
    if ($key['sort'] == 1) {echo '- sort -';}
    if ($key['lourde'] == 1) {echo '- Arme Lourde';}
    if ($key['assaut'] == 1) {echo '- assaut';}
    if ($key['couverture'] == 1) {echo '- Couverture - Cadence de tir = '.$key['cadence'];}
    if ($key['sort'] == 1) {echo ', - sort';}

    echo ' / <strong>Valeur de l\'arme pour la figurine:</strong> &thinsp;'.intval($key['valeur']*$key['puissance']*(($typeDe[$dataOneV[0]['DC']]['prix'])/5.5)).' points
    &thinsp;<form action="gestionDB/del/armeVehicule.php" method="post">
    <input type="hidden" name="idDotation" value="'.$key['idDotationVehicule'].'">
    <input type="hidden" name="idUnite" value="'.$dataOneV[0]['idVehicule'].'">
    <input type="hidden" name="valeur" value="'.$newValeur.'">
    <button class="buttonGestionLore" type="submit" name="button">Effacer</button>
    </form>
    </li>';
    echo '<li><strong>Gabarit:</strong>&thinsp;'.$gabarit[$key['explosif']]['texte'].'
    &thinsp; <strong>Dé d\'explosion:</strong>&thinsp; '.$explosion[$key['dExplosive']]['texte'].'
    </li>';
  }


  $requetteSQL = "SELECT `reglesSpeciales`.`nomRS` FROM `RSArme`
  INNER JOIN `reglesSpeciales` ON `RSArme`.`id_RS` = `reglesSpeciales`.`idRS`
  WHERE `id_arme` =".$key['idArme'];
  $data = $conn->prepare($requetteSQL);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataRS = $data->fetchAll();
  if (empty($dataRS)) {
    echo "Pas de règles spécial pour {$key['nomArme']}.";
  } else {
    echo '<ul class="listRow"><li><strong>Règles spéciales: </strong></li>';
    foreach ($dataRS as $listing) {
    echo '<li>  &thinsp;'.$listing['nomRS'].'&thinsp;</li>';
  }


  }


  echo '</ul></ul>';
}

?>
</div>
