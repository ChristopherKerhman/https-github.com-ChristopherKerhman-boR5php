<ul class="listSimple">
  <?php
  include 'gestionDB/identifiantDB.php';
  $requetteSQL = "SELECT `nomRS`,`valeurRS`, `typeRS` FROM `reglesSpeciales` WHERE `valide`= 1 ORDER BY `nomRS` DESC";
  include 'gestionDB/readDB.php';
  $data->bindParam(':id', $_SESSION['idUser']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  // Liste des éléments pour noter l'impact de chaque règles spéciales.
$type = array('armes', 'véhicules', 'figurines');
foreach ($dataTraiter as $key) {
  $index = $key['typeRS'] - 1;
    echo '<li><strong>'.$key['nomRS'].'</strong> Valeur : '.$key['valeurRS'].' / impact les '.$type[$index].'.</li>';
}
   ?>
</ul>
