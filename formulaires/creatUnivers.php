 <div id="VERROUBOOL">
   <article v-show="cle">
     <button class="buttonGestionLore" type="button" name="button" v-on:click="cle = false">Afficher les univers déjà créer</button>
       <h3>Création d'un nouvelle univers ?</h3>
       <p>Il vous reste <?php echo $_SESSION['createur'] ?> univers à créer.</p>
     <form class="conteneur_col" action="gestionDB/record/addMultivers.php" method="post">
     <label for="nameUnivers">Le nom de votre univers :</label>
     <input id="nameUnivers" class="sizeInpute" type="text" name="nomUnivers" placeholder="Nom de l'univers" required>
     <label for="NT">Niveau technologique :</label>
     <input id="NT" class="sizeInpute" type="number" name="NT" min="0" max="12" required>
     <br />
     <button class="classique" type="submit" name="button">Enregistrer</button>
   </form>
   </article>
   <article v-show="!cle">
     <button class="buttonGestionLore" type="button" name="button" v-on:click="cle = true">Afficher les univers restant à créer</button>
    <?php include 'affichages/listeUnivers.php'; ?>
   </article>
 </div>
