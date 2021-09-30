<?php
function filter($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
function filter_Texte($texte) {
  $texte = trim($texte);
  $texte = stripslashes($texte);
  //$data = htmlspecialchars($data);
  // Génération du lexique des mots interdits.
  return $texte;
}
function checkBirthDate ($data) {
  $date = $data;
  $year = substr($date,0,4);
  $month = substr($date,5,2);
  $day = substr($date,8,2);
  return checkdate($month, $day, $year);
}
function checkemptyData($data) {
  if ($data == '') {
    return header('location: ../../index.php');
  }
}
function haschage($data) {
  $option = ['cost' => 10];
  $data = password_hash($data, PASSWORD_BCRYPT, $option);
  return $data;
}
function doublon($donnee){
  $serverName = "localhost";
  $userName = "zxbkuypj_karine";
  $password = "W7&nHV)MuHVMg.)&HH";
  $dbName = "zxbkuypj_administratum";
  $requetteSQL = "SELECT `login` FROM `users` WHERE `login` = :donnee";
  try {
    $conn = new PDO("mysql:host=$serverName;dbname=$dbName", $userName, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $data = $conn->prepare($requetteSQL);
  } catch(PDOException $e) {
   echo "Error: " . $e->getMessage();
  }
  $data->bindParam(':donnee', $donnee);
  $data->execute();
  $data->setFetchMode(PDO::FETCH_ASSOC);
  $dataLog = $data->fetchAll();
  if (empty($dataLog)) {
    return true;
  } else {
    return false;
  }
}
 ?>
