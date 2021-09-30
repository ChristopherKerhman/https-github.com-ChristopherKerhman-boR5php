<?php
// Fonction pour brasser la date
function brassageDate($data) {
  $date = $data;
  $year = substr($date,0,4);
  $month = substr($date,5,2);
  $day = substr($date,8,2);
  $date = $day.'/'.$month.'/'.$year;
  return $date;
}
 ?>
 <!--Element pour créer la présentation des textes.-->
 <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
 <script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
 <!--En attendant grapeJS-->
<form class="conteneur_col" action="gestionDB/edit/profil.php" method="post">
<div class="conteneur_row">
  <label for="prenom">Prenom &thinsp;</label>
  <input id="prenom" class="sizeInpute" type="text" name="prenom" value="<?php echo $dataProfil[0]['prenom'] ?>" required>
</div>
<div class="conteneur_row">
  <label for="nom">Nom &thinsp;</label>
  <input id="nom" class="sizeInpute" type="text" name="nom" value="<?php echo $dataProfil[0]['nom'] ?>" required>
</div>
<div class="conteneur_row">
  <label for="nom">Speudo &thinsp;</label>
  <input id="nom" class="sizeInpute" type="text" name="login" value="<?php echo $dataProfil[0]['login'] ?>" required>
</div>
<div class="conteneur_row">
  <p>
    Nombre d'univers à créer ? &thinsp;<?php echo $dataProfil[0]['createur']; ?>
  </p>
</div>
<label for="about">A propos de moi :</label>
<textarea id="about" name="description" rows="8" cols="80"><?php echo $dataProfil[0]['description']; ?></textarea>
<p>
  Date d'inscription : <strong><?php echo brassageDate($dataProfil[0]['dateInscription']); ?></strong>
</p>
<div id="VERROU">
  <article v-if="cle">
    <div class="conteneur_col">
    <a class="lienNav" href="editEMAIL.php">Ajouter un mail de sécurité</a>
    <a class="lienNav" href="editMDP.php">Changer votre mot de passe ?</a>
      <i class="fas fa-exclamation-triangle doublesize"></i>
      <label for="consentement">Désactiver votre compte</label>
    <select id="consentement" class="sizeInpute" name="consentementUser">
      <option value="0">Désactiver mon compte</option>
      <option value="1" selected>Laisser actif mon compte</option>
    </select>  <i class="fas fa-exclamation-triangle doublesize"></i>
    </div>
  </article>
  <article v-else>
    <a class="lienNav" v-on:click="cle = true">Securité du compte</a>
  </article>
</div>
    <br />
  <button class="classique" type="submit" name="button">Mettre à jour</button>
</form>
<?php include 'composantVueJS/verrou.php';  ?>
