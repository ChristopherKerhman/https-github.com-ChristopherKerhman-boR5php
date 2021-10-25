<?php
// Fonction pour brasser la date
include 'stockage/brassageDate.php';
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
    <strong>Nombre d'univers à créer ?</strong> &thinsp;<?php echo $dataProfil[0]['createur']; ?>
  </p>
</div>
<!---<label for="about">A propos de moi :</label>
<textarea id="about" name="description" rows="8" cols="80"><?php //echo $dataProfil[0]['description']; ?></textarea>-->
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
    <a class="lienNav" v-on:click="cle = true">Securité du compte</a><br />
    <a v-if="!chartes" class="lienNav" v-on:click="chartes = true"><i class="fas fa-door-open"></i> Chartes de bonne conduite</a><a v-else class="lienNav" v-on:click="chartes = false"><i class="fas fa-door-closed"></i> Chartes de bonne conduite</a>
  </article>
  <article v-if="chartes" class="paragraphe">
    <?php if($dataProfil[0]['consentementUser'] == 1) {
      echo '<h4>Vous avez signé la chartes de bonne conduite le '.brassageDate($dataProfil[0]['dateInscription']).' lors de votre inscription.</h4>';
    } else {
      echo '<h4>Vous n\'avez pas signé la chartes de bonne conduite.</h4>';
    } ?>
  <?php include 'stockage/chartes.php'; ?>
  </article>
</div>
    <br />
  <button class="classique" type="submit" name="button">Mettre à jour</button>
</form>
<?php include 'composantVueJS/verrou.php';  ?>
