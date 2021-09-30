<ul class="listSimple">
  <?php

  include 'gestionDB/read/readRSW.php';
  // Variable de stokage des résultats : $dataRS
  //['idRS']["nomRS"]["descriptionRS"]["valeurRS"]
  foreach ($dataRS as $key) {
    echo '<li><form action="gestionDB/record/addRSWeapon.php"  method="post">
    <input type="hidden" name="id_RS" value="'.$key['idRS'].'">
    <h3>'.$key['nomRS'].'</h3>
    <p class="encart">'.$key['descriptionRS'].'</p>
    <button class="classique" type="button" name="button">'.$key['nomRS'].'</button>
    </form></li>';
  }
   ?>
</ul>
