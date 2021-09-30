<div class="conteneur_col">
<?php
if ($dataTraiter[0]['niveauPublication'] == 0) {
  $levelP = 'Privé';
  $select = 0;
}
if ($dataTraiter[0]['niveauPublication'] == 1) {
  $levelP = 'Contributeur uniquement';
  $select = 1;
}
if ($dataTraiter[0]['niveauPublication'] == 2) {
  $levelP = 'Publique';
  $select = 2;
}
 ?>
<!--Element pour créer la présentation des textes.-->
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
<!--En attendant grapeJS-->

<article class="conteneur_col">
  <form action="gestionDB/edit/updateLore.php" method="post">
    <label for="titreArticle">Titre de votre article :</label>
    <input id="type" class="sizeInpute" type="text" name="titreLore" value="<?php echo $dataTraiter[0]['titreLore']; ?>" placeholder="<?php echo $dataTraiter[0]['titreLore']; ?>" size="50">
    <div class="conteneur_col" id="sample">
      <label for="articleLore"><h3>Article à modifier ?</h3></label>
      <textarea class="backgroundTextarea" name="articleLore" rows="8" cols="80"><?php echo $dataTraiter[0]['articleLore']; ?></textarea>
    </div>
      <div class="conteneur_row">
<label for="level">Niveau d'accessibilité :</label>
<select id="level" class="sizeInpute" name="niveauPublication">
<?php
  if($select === 0) {
  echo '<option value="0" selected>Privé</option>
    <option value="1">Contributeur uniquement</option>
    <option value="2">Publique</option>';
  }
  if($select === 1) {
  echo '<option value="0">Privé</option>
    <option value="1" selected>Contributeur uniquement</option>
    <option value="2">Publique</option>';
  }
  if($select === 2){
  echo '<option value="0">Privé</option>
    <option value="1">Contributeur uniquement</option>
    <option value="2" selected>Publique</option>';
  }
?>
</select>
     <input type="hidden" name="id" value="<?php echo $dataTraiter[0]['idLore']; ?>">
      <button class="classique" type="submit" name="button">Modifier</button>
    </div>
  </form>
</article>
</div>
