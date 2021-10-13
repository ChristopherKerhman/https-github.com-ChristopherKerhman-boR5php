<ul class="listSimple">
  <?php
  include 'gestionDB/identifiantDB.php';
  $requetteSQL = "SELECT `idRS`, `nomRS`,`valeurRS`, `typeRS` FROM `reglesSpeciales` WHERE `valide`= 1 ORDER BY `nomRS` ASC";
  $data = $conn->prepare($requetteSQL);
  $data->bindParam(':id', $_SESSION['idUser']);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataTraiter = $data->fetchAll();
  // Liste des éléments pour noter l'impact de chaque règles spéciales.
$type = array('armes', 'véhicules', 'figurines');
foreach ($dataTraiter as $key) {
  $index = $key['typeRS'] - 1;
    echo '<li class="conteneur_row"><form  action="gestionDB/del/rs.php" method="post">
      <input type="hidden" name="idRS" value="'.$key['idRS'].'">
      <button class="buttonGestionLore" type="submit" name="button"><i class="fas fa-trash-alt"></i></button>
    </form><strong><a class="lienNav" href="ficheRS.php?idRS='.$key['idRS'].'">'.$key['nomRS'].'</a></strong> Valeur : '.$key['valeurRS'].' / impact les '.$type[$index].'. </li>';
}
   ?>
</ul>
