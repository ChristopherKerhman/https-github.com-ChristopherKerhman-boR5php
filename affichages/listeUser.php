<ul class="listBox">
  <?php include 'gestionDB/read/listeUser.php';
  foreach ($dataListe as $key) {
    echo '<li ><a class="lienNav" href="doter.php?id='.$key['idListeArmee'].'">'.$key['nomListe'].' - Nom univers : '.$key['nomUnivers'].' Nom faction : '.$key['nomFaction'].' Valeur : '.$key['valeurListe'].'</a></li>';
  }
  ?>

</ul>
