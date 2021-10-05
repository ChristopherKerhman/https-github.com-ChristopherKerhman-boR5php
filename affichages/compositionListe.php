<article>

<?php
$requetteSQL = "SELECT `idDotationListe`, `id_Unite`, `nbr`, `TotalValeur`, `unites`.`nomFigurine`
FROM `doterListeArmee`
INNER JOIN `unites` ON `unites`.`idUnite` = `doterListeArmee`.`id_Unite`
WHERE `idListe` = :id";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $dataListe[0]['idListeArmee']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataDetailListe = $data->fetchAll();
echo '<div class="conteneur_row">';
if (!empty($dataDetailListe)) {
echo '<article class="marge"><h3>Détaille de la compostion de la liste des unitées</h3><p class="paragraphe">';

  foreach ($dataDetailListe as $key) {
  echo '<strong>Nom:</strong> '.$key['nomFigurine'].'<br /><strong>Nombre :</strong>  '.$key['nbr'].'<br /><strong>Valeur:</strong> '.$key['TotalValeur'].' points<br />
  <a class="lienNav" href="gestionDB/del/detailListe.php?id='.$key['idDotationListe'].'&idListe='.$dataListe[0]['idListeArmee'].'">Supprimer</a><br /><br />';
  }
echo '</p></article>';
}
$requetteSQL = "SELECT `idDotationListe`, `id_Vehicule`, `nbr`, `TotalValeur`, `vehicule`.`nomVehicule`
FROM `doterListeArmee`
INNER JOIN `vehicule` ON `vehicule`.`idVehicule` = `doterListeArmee`.`id_Vehicule`
WHERE `idListe` = :id";
$data = $conn->prepare($requetteSQL);
$data->bindParam(':id', $dataListe[0]['idListeArmee']);
$data->execute();
$data->setFetchMode(PDO::FETCH_ASSOC);
$dataDetailListe = $data->fetchAll();
if (!empty($dataDetailListe)) {
echo '<article class="marge"><h3>Détaille de la compostion de la liste des véhicules</h3><p class="paragraphe">';
foreach ($dataDetailListe as $key) {
echo '<strong>Nom:</strong> '.$key['nomVehicule'].'<br /><strong>Nombre :</strong>  '.$key['nbr'].'<br /><strong>Valeur:</strong> '.$key['TotalValeur'].' points<br />
<a class="lienNav" href="gestionDB/del/detailListe.php?id='.$key['idDotationListe'].'&idListe='.$dataListe[0]['idListeArmee'].'">Supprimer</a><br /><br />';
}
echo '</p></article>';
}
echo '</div>';
?>
</article>
