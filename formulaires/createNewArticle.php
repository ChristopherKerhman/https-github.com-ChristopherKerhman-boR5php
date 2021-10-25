<!--Element pour créer la présentation des textes.
<script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>-->
<?php
  if (isset($_GET['error5'])){ echo '<p class="avertissement">'.$_GET['error5'].'</p>'; }
  if (isset($_GET['error6'])){ echo '<p class="avertissement">'.$_GET['error6'].'</p>'; }
  if (isset($_GET['error7'])){ echo '<p class="avertissement">'.$_GET['error7'].'</p>'; }
?>
<!--En attendant grapeJS-->
<article class="conteneur_col">
  <form class="" action="gestionDB/record/newArticle.php" method="post">
    <label for="titreArticle">Titre de votre article :</label>
    <input id="titreArticle" class="sizeInpute" type="text" name="titreLore" placeholder="Titre de votre article" size="50">
    <?php
      include 'affichages/universDuCreateur.php';
     ?>
    <div class="conteneur_col" id="sample">
      <label for="articleLore"><h3>Votre nouvelle article</h3></label>
      <textarea class="backgroundTextarea" name="articleLore" rows="8" cols="80">Texte minum de 255 caractères.</textarea>
    </div>
      <div class="conteneur_row">
    <label for="level">Niveau d'accessibilité :</label>
    <select id="level" class="sizeInpute" name="niveauPublication">
      <option value="0" selected>Privé</option>
      <option value="1">Contributeur uniquement</option>
      <option value="2">Publique</option>
    </select>
      <button class="classique" type="reset" name="button">Effacer</button>
      <button class="classique" type="submit" name="button">Enregistrer</button>
    </div>
  </form>
</article>
