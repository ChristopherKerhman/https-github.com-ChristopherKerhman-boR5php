<?php
session_start();
if (isset($autorisation) && ($autorisation > $_SESSION['role'])) {
  session_destroy();
  header('location: https://blog.ludis-r5.fr');
}
$titre =  "R5 Le jeu de bataille générique";
$slogan = "Recycler vos figurines et donner leur une seconde vie";
$css = 'css/master.css';
$vueJSCDN = 'node_modules/vue/dist/vue.global.prod.js';
 ?>
