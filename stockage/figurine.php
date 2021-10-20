<?php
// Générale
$yes = [
  ['index' => 0, 'texte' => 'Non'],
  ['index' => 1, 'texte' => 'Oui'],
];
$typeDe = [
  ['de' => 'D6', 'valeur' => 0, 'prix' => 6],
  ['de' => 'D8', 'valeur' => 1, 'prix' => 8],
  ['de' => 'D10', 'valeur' => 2, 'prix' => 10],
  ['de' => 'D12', 'valeur' => 3, 'prix' => 12],
];
// Armes explosive
$gabarit = [
  ['index' => 0, 'texte' => 'Non applicable', 'prix' => 0],
  ['index' => 1, 'texte' => 'Non applicable', 'prix' => 3],
  ['index' => 2, 'texte' => 'Petit', 'prix' => 2],
  ['index' => 3, 'texte' => 'Moyen', 'prix' => 5],
  ['index' => 4, 'texte' => 'Grand', 'prix' => 10],
];
$explosion = [
    ['index' => 0, 'texte' => 'Non applicable', 'prix' => 0],
    ['index' => 1, 'texte' => 'Non applicable - 1D2 Blessure', 'prix' => 1],
    ['index' => 2, 'texte' => 'D6 - 1D3 blessure', 'prix' => 2],
    ['index' => 3, 'texte' => 'D8 - 1D4 blessure', 'prix' => 4],
    ['index' => 4, 'texte' => 'D10 - 1D6 Blessure', 'prix' => 8],
    ['index' => 5, 'texte' => 'D12 - 1D6 + 1 blessures', 'prix' => 10],
];
// Figurines
$pdv = [
  ['index' => 0, 'pdv' => 1],
  ['index' => 1, 'pdv' => 2],
  ['index' => 2, 'pdv' => 3],
  ['index' => 3, 'pdv' => 4],
  ['index' => 4, 'pdv' => 5],
  ['index' => 5, 'pdv' => 6],
  ['index' => 6, 'pdv' => 7],
  ['index' => 7, 'pdv' => 8],
  ['index' => 8, 'pdv' => 9],
  ['index' => 9, 'pdv' => 10]
];
$sauvegarde = [
  ['index' => 0, 'Type' => 'Aucune sauvegarde', 'prix'  => 0.1, 'message' => 'Vêtement sans protection'],
  ['index' => 1, 'Type' => '6+', 'prix'  => 0.16, 'message' => 'Vêtement de combat'],
  ['index' => 2, 'Type' => '5+', 'prix'  => 0.32, 'message' => 'Gilet de combat'],
  ['index' => 3, 'Type' => '4+', 'prix'  => 0.5, 'message' => 'Armure légère'],
  ['index' => 4, 'Type' => '3+', 'prix'  => 0.6, 'message' => 'Armure'],
  ['index' => 5, 'Type' => '3++', 'prix'  => 0.75, 'message' => 'Armure lourde']
];
$typeFigurine = [
  ['taille' => 'Petite', 'valeur' => 0, 'prix' => 0],
  ['taille' => 'Standard', 'valeur' => 1, 'prix' => 1],
  ['taille' => 'Grande', 'valeur' => 2, 'prix' => 1.5],
  ['taille' => 'Géante', 'valeur' => 3, 'prix' => 2.5]
];
$typeTroupe = [
['troupe' => 'Civile', 'valeur' => 0 , 'prix' => 0,5, 'pc' => 0.0208],
['troupe' => 'Conscrit', 'valeur' => 1, 'prix' => 1, 'pc' => 0.0417],
['troupe' => 'Troupe régulière', 'valeur' => 2, 'prix' => 2, 'pc' => 0.083333],
['troupe' => 'Troupe d\'élite', 'valeur' => 3, 'prix' => 4, 'pc' => 0.16667],
['troupe' => 'Soutient Tactique', 'valeur' => 4, 'prix' => 5, 'pc' => 0.25],
['troupe' => 'Officier suppérieur', 'valeur' => 5, 'prix' => 10, 'pc' => 2],
['troupe' => 'Mage', 'valeur' => 6, 'prix' => 8, 'pc' => 1]
];

// Véhicules
$typeVehicule = [
  ['index' => 0, 'type' => 'Militaire', 'prix' => 2],
  ['index' => 1, 'type' => 'civile', 'prix' => 1],
];
$equipage = [
  ['index'=> 0, 'equipage' => 1, 'prix' => 1],
  ['index'=> 1, 'equipage' => 2, 'prix' => 2],
  ['index'=> 2, 'equipage' => 3, 'prix' => 4],
  ['index'=> 3, 'equipage' => 4, 'prix' => 6],
  ['index'=> 4, 'equipage' => 5, 'prix' => 10],
  ['index'=> 5, 'equipage' => 6, 'prix' => 12]
];
$passager = [
  ['index'=> 0, 'nbr' => 0, 'prix'=> -1],
  ['index'=> 1, 'nbr' => 1, 'prix'=> 1],
  ['index'=> 2, 'nbr' => 2, 'prix'=> 3],
  ['index'=> 3, 'nbr' => 3, 'prix'=> 4],
  ['index'=> 4, 'nbr' => 5, 'prix'=> 6],
  ['index'=> 5, 'nbr' => 7, 'prix'=> 8],
  ['index'=> 6, 'nbr' => 8, 'prix'=> 10],
  ['index'=> 7, 'nbr' => 9, 'prix'=> 11],
  ['index'=> 8, 'nbr' => 10, 'prix'=> 13],
];
$blindage = [
  ['index' => 0, 'svg' => 'aucune', 'type' => 'Civile', 'prix' => 0.1],
  ['index' => 1, 'svg' => '6+', 'type' => 'Blindage léger', 'prix' => 0.16],
  ['index' => 2, 'svg' => '5+', 'type' => 'Blindage basique', 'prix' => 0.32],
  ['index' => 3, 'svg' => '4+', 'type' => 'Blindage réactif', 'prix' => 0.5],
  ['index' => 4, 'svg' => '3+', 'type' => 'Blindage haut résistance', 'prix' => 0.6],
  ['index' => 5, 'svg' => '3++', 'type' => 'Blindage suppérieur', 'prix' => 0.75],
];
$structure = [
  ['index' => 0, 'ps' => 1, 'prix' => 0],
  ['index' => 1, 'ps' => 2, 'prix' => 1],
  ['index' => 2, 'ps' => 3, 'prix' => 2],
  ['index' => 3, 'ps' => 4, 'prix' => 4],
  ['index' => 4, 'ps' => 5, 'prix' => 6],
  ['index' => 5, 'ps' => 6, 'prix' => 8],
  ['index' => 6, 'ps' => 7, 'prix' => 10],
  ['index' => 7, 'ps' => 8, 'prix' => 12],
  ['index' => 8, 'ps' => 9, 'prix' => 16],
  ['index' => 9, 'ps' => 10, 'prix' => 18],
  ['index' => 10, 'ps' => 11, 'prix' => 20],
  ['index' => 11, 'ps' => 12, 'prix' => 24],
];


 ?>
