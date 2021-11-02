<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col">
<?php
  $id = $_GET['id'];
  include 'gestionDB/read/monoVehicule.php';
  // data sortie : $dataOneV
  include 'stockage/typeVehicule.php';
  include 'stockage/de.php';
  include 'stockage/gabarit.php';

if (!empty($dataOneV)) {
//print_r($dataOneV);
echo '<div class="boxePresentation"><ul class="listeVehicule">
<li><strong>Faction du véhicule:</strong> '.$dataOneV[0]['nomFaction'].'</li>
<li><strong>Type:</strong> '.$typeVehicule[$dataOneV[0]['typeVehicule']]['type'].' <strong>Blindage:</strong> '.$blindage[$dataOneV[0]['svg']]['type'].'  </li>
<li><strong>DQM: </strong> '.$typeDe[$dataOneV[0]['DQM']]['de'].' <strong>DC: </strong> '.$typeDe[$dataOneV[0]['DC']]['de'].'</li>
<li><strong>Mouvement tactique:</strong> '.$dataOneV[0]['mouvementVehicule'].' "/ '.$dataOneV[0]['courseVehicule'].'" + 1D4"</li>
<li><strong>Mouvement tactique:</strong> '.round($dataOneV[0]['mouvementVehicule'] * 2,54, 0).' cm/ '.round($dataOneV[0]['courseVehicule'] * 2.54, 0).' cm + 2D4 cm</li>
<li><strong>Equipage:</strong> '.$equipage[$dataOneV[0]['equipage']]['equipage'].' <strong>Passager:</strong> '.$passager[$dataOneV[0]['passager']]['nbr'].'</li>

<li><strong>Point de structure:</strong> '.$structure[$dataOneV[0]['pointStructure']]['ps'].' <strong>Sauvegarde:</strong> '.$blindage[$dataOneV[0]['svg']]['svg'].'</li>
<li><strong>Prix:</strong> '.round($dataOneV[0]['valeur'], 0).' points</li>
</ul>
<p class="paragrapheVehicule"><strong>Description :</strong><br />'.$dataOneV[0]['descriptionVehicule'].'</p></div>';
} else {
    echo 'Pas de données.';
  }
?>
  <form action="gestionDB/record/addVehicule.php" method="post">
    <label for="nom">Changer le nom du vehicule à cloner ?</label>
    <input class="sizeInpute" type="text" name="nomVehicule" placeholder="<?=$dataOneV[0]['nomVehicule']?>" required />
    <input type="hidden" name="id_proprietaire" value="<?=$dataOneV[0]['id_proprietaire']?>">
    <input type="hidden" name="id_faction" value="<?=$dataOneV[0]['id_faction']?>">
    <input type="hidden" name="typeVehicule" value="<?=$dataOneV[0]['typeVehicule']?>">
    <input type="hidden" name="equipage" value="<?=$dataOneV[0]['equipage']?>">
    <input type="hidden" name="passager" value="<?=$dataOneV[0]['passager']?>">
    <input type="hidden" name="descriptionVehicule" value="<?=$dataOneV[0]['descriptionVehicule']?>">
    <input type="hidden" name="deplacement" value="<?=$dataOneV[0]['mouvementVehicule']?>">
    <input type="hidden" name="course" value="<?=$dataOneV[0]['courseVehicule']?>">
    <input type="hidden" name="vol" value="<?=$dataOneV[0]['vol']?>">
    <input type="hidden" name="station" value="<?=$dataOneV[0]['stationnaire']?>">
    <input type="hidden" name="DQM" value="<?=$dataOneV[0]['DQM']?>">
    <input type="hidden" name="DC" value="<?=$dataOneV[0]['DC']?>">
    <input type="hidden" name="pointStructure" value="<?=$dataOneV[0]['pointStructure']?>">
    <input type="hidden" name="svg" value="<?=$dataOneV[0]['svg']?>">
    <button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-copy"></i></button>
  </form>
</section>
<?php
  include 'footer.php';
?>
