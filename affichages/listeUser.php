<ul class="listBox">
  <?php include 'gestionDB/read/listeUser.php';
  foreach ($dataListe as $key) {
    if ($key['valide'] == 1) {
    echo '<li ><a class="lienNav" href="doter.php?id='.$key['idListeArmee'].'">'.$key['nomListe'].' - Nom univers : '.$key['nomUnivers'].' Nom faction : '.$key['nomFaction'].'</a> <strong>Valeur : '.$key['valeurListe'].' points</strong></li>';
    }
  }
  ?>

</ul>
<h4>Gestion des listes de l'utilisateur</h4>
<h4>Liste valide</h4>
<ul class="listBox">
  <?php
  foreach ($dataListe as $key) {
      if ($key['valide'] == 1){
    if ($key['fixerListe'] == 1) {
    $ok = '<i class="fas fa-cloud-upload-alt"></i>';
   } else {
     $ok = '<i class="fas fa-cloud"></i>';
   }

    echo '<li >'.$ok.' '.$key['nomListe'].' - Nom univers : '.$key['nomUnivers'].' Nom faction : '.$key['nomFaction'].'
    <a class="lienNav" href="gestionDB/edit/valideListe.php?id='.$key['idListeArmee'].'">Invalider</a></li>';}
  }
  ?>
</ul>
<h4>Liste non-valide</h4>
<ul class="listBox">
  <?php
  foreach ($dataListe as $key) {
      if ($key['valide'] == 0){
         $ok = '<i class="fas fa-cloud"></i>';
    echo '<li >'.$ok.'  '.$key['nomListe'].' - Nom univers : '.$key['nomUnivers'].' Nom faction : '.$key['nomFaction'].'
    <a class="lienNav" href="gestionDB/edit/valideListe.php?id='.$key['idListeArmee'].'">Valider</a></li>';}
  }
  ?>
</ul>
<h4>Effacer une liste invalide</h4>
<p class="paragrape">
  Cette action d'éffacer une liste est irréversible et vous perdrez toute les données la concernant.
</p>
<ul class="listBox">
  <?php include 'gestionDB/read/listeUser.php';
  foreach ($dataListe as $key) {
      if ($key['valide'] == 0){
    echo '<li >'.$key['nomListe'].' - Nom univers : '.$key['nomUnivers'].' Nom faction : '.$key['nomFaction'].' Valeur : '.$key['valeurListe'].'
    <a class="lienNav" href="gestionDB/del/liste.php?id='.$key['idListeArmee'].'">Effacer</a></li>';}
  }
  ?>
</ul>
