<?php
$autorisation = 1;
include 'header.php';
?>
<section class="conteneur_col">
  <h3>Dotation</h3>
  <?php
$id = $_GET['id'];
  include 'gestionDB/read/monoUnite.php';
  // data sortie : $dataOneU
  include 'affichages/oneUnite.php';
  $search = $dataOneU[0]['id_faction'];
  $weaponSize = 0;
  include 'affichages/weaponDotation.php';
   ?>
</section>
  <p class="paragraphe conteneur_col size">Les prix des sorts sont "magiques" et parfois sont plus où moins chère en fonction de leur niveau. Les prix données sont donc "indicatif". En fonction de la chance du sorcier, il ce peut qu'ils payent certain sort plus ou moins chère.</p>
<section class="conteneur_row">

  <?php
  if ($dataOneU[0]['typeTroupe'] == 6) {
    echo '<ul class="listBox">
    <li><h4>Sort de niveau 1</h4></li>';
  
    foreach ($sort as $key) {
      if ($dataOneU[0]['niveauMage'] >= $key['niveau']) {
          if($key['niveau'] == 1) {
            echo '<li class="conteneur_row_left">  <form action="gestionDB/record/sorts.php" method="post">
                <input type="hidden" name="idMage" value="'.$dataOneU[0]['idUnite'].'">
                <input type="hidden" name="indexSortG" value="'.$key['index'].'">
                <input type="hidden" name="level" value="'.$dataOneU[0]['niveauMage'].'" />
                <button class="buttonGestionLore" type="submit" name="button">Affecter</button>
              </form>
              <strong>'.$key['nom'].'</strong> - Sort générique niveau '.$key['niveau'].' Prix environs <strong>&nbsp;'.rand($key['prix'], $key['prix']+1).'</strong>
              </li>';
        }
      }
    }
    echo '</ul>';
  if ($dataOneU[0]['niveauMage'] >=2) {
    echo '<ul class="listBox">
    <li><h4>Sort de niveau 2</h4></li>';
    foreach ($sort as $key) {
      if($key['niveau'] == 2) {
        echo '<li class="conteneur_row_left">  <form action="gestionDB/record/sorts.php" method="post">
            <input type="hidden" name="idMage" value="'.$dataOneU[0]['idUnite'].'">
            <input type="hidden" name="indexSortG" value="'.$key['index'].'">
            <input type="hidden" name="level" value="'.$dataOneU[0]['niveauMage'].'" />
            <button class="buttonGestionLore" type="submit" name="button">Affecter</button>
          </form>
          <strong>'.$key['nom'].'</strong> - Sort générique niveau '.$key['niveau'].' Prix environs <strong>&nbsp;'.rand($key['prix'], $key['prix']+1).'</strong>
          </li>';
      }
    }
  }
  echo '</ul>';
  if ($dataOneU[0]['niveauMage'] == 3) {
    echo '<ul class="listBox">
    <li><h4>Sort de niveau 1</h4></li>';
    foreach ($sort as $key) {
      if($key['niveau'] == 3) {
        echo '<li class="conteneur_row_left">  <form action="gestionDB/record/sorts.php" method="post">
            <input type="hidden" name="idMage" value="'.$dataOneU[0]['idUnite'].'">
            <input type="hidden" name="indexSortG" value="'.$key['index'].'">
            <input type="hidden" name="level" value="'.$dataOneU[0]['niveauMage'].'" />
            <button class="buttonGestionLore" type="submit" name="button">Affecter</button>
          </form>
          <strong>'.$key['nom'].'</strong> - Sort générique niveau '.$key['niveau'].' Prix environs<strong>&nbsp;'.rand($key['prix'], $key['prix']+1).'</strong>
          </li>';
      }
    }
  }
  echo '</ul>';
}
  ?>

  </ul>

</section>
<?php
  include 'footer.php';
?>
