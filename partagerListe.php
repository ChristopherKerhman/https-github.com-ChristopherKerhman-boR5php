<?php
$autorisation = 1;
include 'header.php';
include 'gestionDB/read/listeUser.php';
// $dataListe
?>
<section class="conteneur_col" id="indexBox">
  <?php   if(isset($_GET['message42'])) {echo $_GET['message42'];} ?>
  <h3>Administrer vos listes</h3>

  <ul class="listRS">
  <?php
  foreach ($dataListe as $key) {
    if ($key['fixerListe'] == 0) {
      echo '<li class="boxePresentation"><strong>'.$key['nomUnivers'].' - '.$key['nomFaction'].' - '.$key['nomListe'].' - Status : Non partagée</strong><form action="gestionDB/edit/partagerListe.php" method="post">
          <input type="hidden" name="idListeArmee" value="'.$key['idListeArmee'].'">
          <input type="hidden" name="fixerListe" value="1">
          <button class="buttonGestionLore" type="submit" name="button">Partager</button>
        </form></li>';
    } else {
          echo '<li class="boxePresentation"><strong>'.$key['nomUnivers'].' - '.$key['nomFaction'].' - '.$key['nomListe'].' - Status : Partagée</strong><form action="gestionDB/edit/partagerListe.php" method="post">
            <input type="hidden" name="idListeArmee" value="'.$key['idListeArmee'].'">
            <input type="hidden" name="fixerListe" value="0">
            <button class="buttonGestionLore" type="submit" name="button">Arrêter le partage</button>
          </form></li>';
    }
  }
  ?>
  </ul>
</section>
<?php
  include 'footer.php';
?>
<form action="gestionDB/edit/partagerListe.php" method="post">
  <input type="hidden" name="idListeArmee" value="'.$key['idListeArmee'].'">
  <input type="hidden" name="fixerListe" value="1">
  <button class="buttonGestionLore" type="submit" name="button">Partager</button>
</form>
