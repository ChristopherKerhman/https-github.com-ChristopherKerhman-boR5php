<article class="conteneur_col">
<h3>Création d'un nouveau type d'arme</h3>
  <form action="gestionDB/record/addType.php" method="post">
    <label for="type">Type d'arme :</label>
    <input id="type" class="sizeInpute" type="text" name="typeDescription" placeholder="nouveau type d'arme">
    <br />
    <div id="VERROU">
      <button v-if="!cle" v-on:click="cle = true" class="classique" type="submit" name="button">Déverrouiller</button><button v-else class="classique" type="submit" name="button">Ajouter</button>
    </div>
  </form>
</article>
