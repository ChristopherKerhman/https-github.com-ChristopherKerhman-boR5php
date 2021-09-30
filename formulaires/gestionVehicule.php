<?php
// Tableaux
include 'stockage/de.php';
include 'stockage/typeVehicule.php';
 ?>
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
   <select id="faction" class="sizeInpute" name="id_faction">
     <?php include 'gestionDB/read/factions.php'; // variable de sortie : $dataFaction
       foreach ($dataFaction as $key) {
         echo '<option value="'.$key['idFaction'].'">'.$key['nomUnivers'].' - '.$key['nomFaction'].'</option>';
       }
     ?>
   </select>
 <button class="classique" type="submit" name="button">Rechercher des véhicules</button>
 </form>
 <?php
 include 'gestionDB/controleFormulaires.php';
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $id_faction = filter($_POST['id_faction']);
   if (empty($_POST['id_faction'])) {
   header('location:index.php');
   }
   include 'gestionDB/read/readVehicule.php';
   // donnée de sortie : $dataVehicule
 }
 include 'affichages/listeVehicule.php';
  ?>
