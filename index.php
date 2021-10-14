<?php
//$autorisation = 1;
include 'header.php';
?>
<?php   if(isset($_GET['message42'])) {echo $_GET['message42'];} ?>
<section class="conteneur_row" id="indexBox">
  <?php
   include 'formulaires/indexWeapon.php';
  ?>
  <article>
    <?php
    function read($dataSQL) {
      $serverName = "localhost";
      $userName = "zxbkuypj_karine";
      $password = "W7&nHV)MuHVMg.)&HH";
      $dbName = "zxbkuypj_administratum";
      try {
        $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $data = $conn->prepare($dataSQL);
      } catch(PDOException $e) {
       echo "Error: " . $e->getMessage();
      }
      $data->execute();
      $data->setFetchMode(PDO::FETCH_ASSOC);
      $collection = $data->fetchAll();
      return $collection;
    }
    $requetteSQL = "SELECT COUNT(`idUser`) AS `totalUser` FROM `users` WHERE `consentementUser` = 1";
    $nbrUser = read($requetteSQL);
    $requetteSQL = "SELECT COUNT(`idArme`) AS `totalArme` FROM `armes` WHERE  `verrou` = 1";
    $nbrArme = read($requetteSQL);
    $requetteSQL = "SELECT COUNT(`idUnite`) AS `totalUnite` FROM `unites` WHERE `fixer` = 1";
    $nbrUnite = read($requetteSQL);
    $requetteSQL = "SELECT COUNT(`idVehicule`) AS `totalVehicule` FROM `vehicule` WHERE `fixer` = 1";
    $nbrVehicule = read($requetteSQL);
    $requetteSQL = "SELECT COUNT(`idListeArmee`) AS `totalListe` FROM `listeArmee` WHERE `fixerListe` = 1 AND `valide` = 1";
    $nbrListe = read($requetteSQL);
    $requetteSQL = "SELECT COUNT(`idUnivers`) AS `totalUnivers` FROM `multivers` WHERE `valide` = 1";
    $nbrUnivers = read($requetteSQL);
    $requetteSQL = "SELECT COUNT(`idFaction`) AS `totalFaction` FROM `factions` ";
    $nbrFaction = read($requetteSQL);
     ?>
  <h4>Les statistiques du site</h4>
  <ul class="listBox">
    <li><strong>Nombre d'utilisateur actif :</strong> <?php echo $nbrUser[0]['totalUser']; ?> créateurs</li>
    <li><strong>Nombre d'univers actif :</strong> <?php echo $nbrUnivers[0]['totalUnivers']; ?> univers</li>
    <li><strong>Nombre de faction :</strong> <?php echo $nbrFaction[0]['totalFaction']; ?> factions</li>
    <li><strong>Nombre d'arme créer et fixer :</strong> <?php echo $nbrArme[0]['totalArme']; ?> armes</li>
    <li><strong>Nombre d'unité créer et fixer :</strong> <?php echo $nbrUnite[0]['totalUnite']; ?> unitées</li>
    <li><strong>Nombre de vehicule créer et fixer :</strong> <?php echo $nbrVehicule[0]['totalVehicule']; ?> Véhicules</li>
    <li><strong>Nombre de liste partagé :</strong> <?php echo $nbrListe[0]['totalListe']; ?> Listes</li>
  </ul>
  </article>

</section>
<?php
  include 'footer.php';
?>
