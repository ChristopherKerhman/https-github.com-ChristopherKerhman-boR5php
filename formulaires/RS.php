<h4>Les des règles spéciale disponible</h4>
<ul class="listSimple">
<?php
if ($dataWeapon[0]['verrou'] == 1) {
  echo 'Arme verrouiller impossible de la modifier';
} else {
  include 'gestionDB/read/readRSWForAdd.php';
  // donnée de sortie :  $dataRS
  foreach ($dataRS as $key) {
    echo '<li class="conteneur_row">
    Ajouter &nbsp;
    <form  action="gestionDB/record/addRSW.php" method="post">
      <input type="hidden" name="id_RS" value="'.$key['idRS'].'">
      <input type="hidden" name="id_arme" value="'.$idArme.'">
      <input type="hidden" name="message" value="'.$key['nomRS'].'">
      <input type="hidden" name="valeur" value="'.$key['valeurRS'].'" />
      <button class="buttonGestionLore" type="submit" name="button">'.$key['nomRS'].'</button>
      </form>
    </li>';
  }
}

 ?>
</ul>
