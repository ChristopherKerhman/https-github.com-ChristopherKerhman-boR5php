
  <figcaption><h3>Fiche de l'unité</h3></figcaption>
<?php
include 'stockage/typeTroupe.php';
include 'stockage/de.php';
include 'stockage/yes.php';
include 'stockage/gabarit.php';
include 'stockage/sauvegarde.php';
include 'stockage/pointDeVie.php';
if (!empty($dataOneU)) {
echo '<div class="boxePresentation">
<h3>Nom de la figurine : '.$dataOneU[0]['nomFigurine'].'</h3>
<ul class="listeVehicule">
<li><strong>Faction de l\'unité:</strong> '.$dataOneU[0]['nomFaction'].'</li>';
echo '
<li><strong>Type de troupe: </strong>'.$typeTroupe[$dataOneU[0]['typeTroupe']]['troupe'];
if ($dataOneU[0]['niveauMage'] > 0) {
echo ' <strong>Niveau Mage:</strong>'.$dataOneU[0]['niveauMage'].'</li>';
} else {
  echo '</li>';
}
echo '<li><strong>DQM:</strong> '.$typeDe[$dataOneU[0]['DQM']]['de'].' <strong>DC:</strong> '.$typeDe[$dataOneU[0]['DC']]['de'].'</li>
<li><strong>Type de protection:</strong> '.$sauvegarde[$dataOneU[0]['sauvegarde']]['message'].'</li>
<li><strong>Point de vie:</strong>'.$pdv[$dataOneU[0]['pointDeVie']]['pdv'].' Point de vie <strong>Sauvegarde:</strong>'.$sauvegarde[$dataOneU[0]['sauvegarde']]['Type'].'</li>
<li><strong>Valeur:</strong> '.$dataOneU[0]['valeurUnite'].'</li>
</ul>
<p class="paragrapheVehicule"><strong>Description :</strong><br />'.$dataOneU[0]['Description'].'</p>';
// Affichage des éléments d'équipement
  include 'gestionDB/read/dotationUnite.php';

  foreach ($dataDotationUnite as $key)  {
     $newValeur = $dataOneU[0]['valeurUnite'] - $key['valeur']*$key['puissance']*(($typeDe[$dataOneU[0]['DC']]['prix'])/5.5);
     // Arme de mêlée
if ($key['type'] == 1) {
  echo '<ul class="listeVehicule">
    <li class="conteneur_row"><strong>'.$key['typeDescription'].'</strong>&thinsp;-&thinsp;<strong>Nom de l\'arme:</strong>&thinsp;'.$key['nomArme'].'
    <strong>Puissance:</strong>  &thinsp;'.$key['puissance'].$typeDe[$dataOneU[0]['DC']]['de'].'
    ';
    if ($key['sort'] == 1) {echo '- sort -';}

    echo ' / <strong>Valeur de l\'arme pour la figurine:</strong> &thinsp;'.intval($key['valeur']*$key['puissance']*(($typeDe[$dataOneU[0]['DC']]['prix'])/5.5)).' points</li>';
}
if ($key['type'] == 2) {
  echo '<ul class="listeVehicule">
    <li class="conteneur_row"><strong>'.$key['typeDescription'].'</strong> - <strong>Nom de l\'arme:</strong> '.$key['nomArme'].'
     &thinsp;<strong>Puissance:</strong> &thinsp;'.$key['puissance'].$typeDe[$dataOneU[0]['DC']]['de'].'
     &thinsp;<strong>Portée:</strong> &thinsp;'.$key['rangeMax'].' " ou '.round($key['rangeMax'] * 2.54, 0).' cm';
    if ($key['lourde'] == 1) {echo '- Arme Lourde';}
    if ($key['assaut'] == 1) {echo '- assaut';}
    if ($key['couverture'] == 1) {echo '- Couverture - Cadence de tir = '.$key['cadence'];}
    if ($key['sort'] == 1) {echo ', - sort';}

    echo ' / <strong>Valeur de l\'arme pour la figurine:</strong> &thinsp;'.intval($key['valeur']*$key['puissance']*(($typeDe[$dataOneU[0]['DC']]['prix'])/5.5)).' points</li>';
}
if ($key['type'] == 3) {
  echo '<ul class="listeVehicule">
    <li class="conteneur_row"><strong>'.$key['typeDescription'].'</strong> - <strong>Nom de l\'arme:</strong> '.$key['nomArme'].'
     &thinsp;<strong>Puissance:</strong> &thinsp;'.$key['puissance'].$typeDe[$dataOneU[0]['DC']]['de'].'
     &thinsp;<strong>Portée:</strong> &thinsp;'.$key['rangeMax'].' " ou '.round($key['rangeMax'] * 2.54, 0).' cm';
    if ($key['lourde'] == 1) {echo '- Arme Lourde';}
    if ($key['assaut'] == 1) {echo '- assaut';}
    if ($key['couverture'] == 1) {echo '- Couverture - Cadence de tir = '.$key['cadence'];}
    if ($key['sort'] == 1) {echo ', - sort';}

    echo ' / <strong>Valeur de l\'arme pour la figurine:</strong> &thinsp;'.intval($key['valeur']*$key['puissance']*(($typeDe[$dataOneU[0]['DC']]['prix'])/5.5)).' points
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
echo '<ul class="listRow"><li><strong>Règles spéciales de l\'arme : </strong></li>';
foreach ($dataRS as $listing) {
  echo '<li>'.$listing['nomRS'].'&thinsp;</li>';
}
echo '</ul></ul>';
  }
  echo '</div>';
}
?>
