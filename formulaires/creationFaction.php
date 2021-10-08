<article class="conteneur_col">
  <form class="conteneur_col" action="gestionDB/record/newFaction.php" method="post">
    <?php
      include 'affichages/universDuCreateur.php';
      //name="idMultivers"
     ?>
     <label for="titreArticle">nouvelle faction :</label>
     <input id="titreArticle" class="sizeInpute" type="text" name="nomFaction" placeholder="Nom de la faction" size="50">
      <button class="classique" type="submit" name="button">Enregistrer</button>
  </form>
