<div class="conteneur_col">
  <!--Element pour créer la présentation des textes.
  <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>
  <script type="text/javascript">bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });</script>
En attendant grapeJS-->
<form class="conteneur_col" action="gestionDB/record/newsRS.php" method="post">
  <label for="nomRS">Titre de votre article :</label>
  <input id="nomRS" class="sizeInpute" type="text" name="nomRS" placeholder="Nom de la règle spéciale" size="50">
  <label for="description">Texte de la règles spéciale :</label>
  <textarea name="description" rows="8" cols="80"></textarea>
  <div>
    <label for="pourcentageRS">Valeur de la règle spéciale en pourcentage :</label>
    <input id="pourcentageRS" class="sizeInpute" type="number" name="pourcentage" min="0" max="100"> %
    <label for="typeRS">Type de règles spécial</label>
    <select class="sizeInpute" name="typeRS">
      <option value="1">Arme</option>
      <option value="2">Véhicule</option>
      <option value="3">Figurines</option>
    </select>
  </div>
<button class="classique" type="submit" name="button">Enregistrer</button>
</form>
</div>
