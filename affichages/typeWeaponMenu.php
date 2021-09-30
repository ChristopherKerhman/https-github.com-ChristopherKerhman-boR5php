<ul class="listRow">
  <?php
    include 'gestionDB/identifiantDB.php';
    include 'gestionDB/readDB.php';
    $requetteSQL = "SELECT `idTypeArme`, `typeDescription`, `lien` FROM `typeArme` WHERE `Menu` = 1";
      include 'gestionDB/readDB.php';
    $data->execute();
    $data->setFetchMode(PDO::FETCH_ASSOC);
    $dataTraiter = $data->fetchAll();
    foreach ($dataTraiter as $key) {
      echo '<li class="conteneur_menu" ><a class="lienNav" href="createWeapon.php?id='.$key['idTypeArme'].'">'.$key['typeDescription'].'</a></li>';
    }
   ?>
</ul>
