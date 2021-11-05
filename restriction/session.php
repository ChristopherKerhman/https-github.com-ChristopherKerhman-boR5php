<?php
session_start();
if (isset($autorisation) && ($autorisation > $_SESSION['role'])) {
  session_destroy();
  header('location: https://blog.ludis-r5.fr');
}
$titre =  "R5 Le jeu de bataille générique";
$slogan = "Recycler vos figurines et donner leur une seconde vie";

if (isset($_SESSION['darkMode'])) {
if ($_SESSION['darkMode'] == 0) {
  $css = 'css/master.css';
  $Fcss = 'css/Fmaster.css';
} else {
  $css = 'css/masterClear.css';
  $Fcss = 'css/FmasterClear.css';
}
} else {
  $css = 'css/master.css';
  $Fcss = 'css/Fmaster.css';
}
$vueJSCDN = 'node_modules/vue/dist/vue.global.prod.js';
 ?>
