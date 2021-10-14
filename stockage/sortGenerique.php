<?php
$sort = [
  ['index' => 0, 'nom' => 'Méditation intense',
  'description' => 'Sur un jet de DQM à 6+ réussit, le sorcier génère pour lui seul 1D3 pions de commandement supplémentaire.',
  'niveau' => 1, 'prix' => 3],
  ['index' => 1, 'nom' => 'Protection',
  'description' => 'Le sorcier sur un jet de DC à 4+ réussit génère un écran de protection autour de lui d’une surface d’un gabarit moyenne. Toucher avec une arme de tir, une cible dans cette zone pour tout le tour est à +1 comme malus de base.',
  'niveau' => 1, 'prix' => 3],
  ['index' => 2, 'nom' => 'Éjection', 'description' => 'Le sorcier sur un jet de DC à 4+ éjecte toutes les figurines au contact autour de lui, jusque 2 ’’ de distance de son socle, sur 1D6 ’’ dans une direction aléatoire et
  elle subissent 1 touche automatique que l’on peut sauvegarder.',
  'niveau' => 1, 'prix' => 5],
  ['index' => 3, 'nom' => 'Concentration intense', 'description' => 'Le sorcier se concentre et octroie aux troupes autours de lui (dans un gabarit moyen) un -1 à la difficulté de leur jet de DC durant tout le tour.',
  'niveau' => 1, 'prix' => 6],
  ['index' => 4, 'nom' => 'Rigoris Mortis', 'description' => 'Une unité est prise pour cible jusque 12 ’’ du sorcier, sur un jet de DC à 4+, celle-ci passe en « Tête baissée ». Il doit y avoir une ligne de vu entre le Mage et l’unité visée.',
  'niveau' => 1, 'prix' => 8],
  ['index' => 5, 'nom' => 'Régénération et soins', 'description' => 'Les troupes tombée au combat ou blessé sont soignés dans un rayon d’un grand gabarit autour du sorcier. Le sort doit réussir un jet de DC à 4+
  (+ le nombre de combattants à 0 PV à soigner par magie dans le grand gabarit). Le magicien ne peut pas se soigner lui-même, les combattant regagne tous 1 point de vie en cas de réussite. Dans le cas d’un échec,
  leur figurine est retirée de la zone de combat selon la procédure habituelle.',
  'niveau' => 2, 'prix' => 6],
  ['index' => 6, 'nom' => 'Invisibilité', 'description' => 'Le sorcier sur un grand gabarit peut cacher une unité de son choix jusque 12 ’’ de distance. L’unité sous cette protection durant le tour, seront considéré comme invisible
  (impossible de les prendre pour cible de loin) mais seront sensible au combat au contact même si elles deviennent invisibles sous ce statut. Elles pourront prendre pour cible uniquement des cibles à 10 pouces de distance de leur
  position, quelques soit leur type d’arme de tir.', 'niveau' => 2, 'prix' => 3],
  ['index' => 7, 'nom' => 'Concentration intense étendus', 'description' => 'Le sorcier se concentre et octroie aux troupes autours de lui (dans un grand gabarit) un -1 à la difficulté de leur jet de DC et de DQM durant tout le tour.',
  'niveau' => 2, 'prix' => 8],
  ['index' => 8, 'nom' => 'Deus Rigoris Mortis', 'description' => 'Une unité est prise pour cible jusque 24 ’’ du sorcier, sur un jet de DC à 4+, celle-ci passe en « tête baissée ».  Il doit y avoir une ligne de vu entre le Mage et l’unité visée',
  'niveau' => 2, 'prix' => 12],
  ['index' => 9, 'nom' => 'Malédiction météo', 'description' => '1 fois par partie, le sorcier est capable de déchaîner les éléments, sur un jet de DQM à 6+. La pluie tombe, le vent se lève, la grêle et le froid domine le champ de bataille à chaque
  tour sur 3+ sur 1D6 à partir du moment où le sort est jeté. Considéré le combat comme basculant de fait en « combat nocturne » pour tous les combattants de la zone. Les conditions météos rendent aussi les armes plus mortelles, ajouter une perte
  automatique de 1PV supplémentaire par touche non sauvegardé durant tous le temps de ce sort. Le magicien peut lever les conditions météos quand il le désire lors de la phase d’initiative après avoir eu le résultat de celle-ci, s’il ne le fait pas,
   tester simplement si les conditions sont maintenus pour le tour qui débute.',
   'niveau' => 3, 'prix' => 15],
  ['index' => 10, 'nom' => 'Séisme magique', 'description' => 'Sur un jet de DC à 6+, un gabarit moyen peut se placer n’importe où sur le champ de bataille, toutes les figurines sous ce gabarit subissent une touche automatique et peuvent tenter de
  la sauvegarder. Les bâtiments qui subissent se sort, sont transformé automatiquement en ruine. Les ruines en couvert léger, les couverts léger sont retiré de la zone de combat.',
  'niveau' => 3, 'prix' => 8],
  ['index' => 11, 'nom' => 'Feu spectral', 'description' => 'Une fois par partie, sur un jet de DQM à 6+, un grand gabarit de feu spectrale se pose n’importe où sur la zone de combat. Les figurines dans ce grand gabarit sont attaqué par un feu
  spectral qui touche sur 4+/D8 sans sauvegarde possible. Les spectres, les morts vivant, les droïdes et les robots sont immunisé à ce sort. ',
  'niveau' => 3, 'prix' => 12],
  ['index' => 12, 'nom' => 'Souffle du dragon', 'description' => 'Le sorcier vise une unité jusque 12’’ de lui et les transforme en cracheur de feu sur un jet de DQM à 6+. L’unité touche sur un jet normal de DC enflamme sa cible sur 3+ sur D6.
  Appliquer la règles spécial « enflammé ».',
  'niveau' => 3, 'prix' => 15],
  ['index' => 13, 'nom' => 'Téléportation d’unité', 'description' => 'Le Mage peut téléporter une unité (jusque 12 combattants) jusque 24 pouces de sa position. L’unité disparaît lors de la mise en route du sort et réapparais au début du tour
  suivant là où le désir le joueur qui contrôle le Mage. En cas d’échec, l’unité disparaît simplement et ne réapparaîtra plus de la partie. Cela peut aussi être 1 véhicule.', 'niveau' => 3, 'prix' => 6],
  ['index' => 13, 'nom' => 'Tricher avec le hasard', 'description' => 'Le Mage peut lancer ce sort et il aura une influence durant tout le tour en cours. Le joueur peut alors relancer 1 fois, tous les jets de dés de ces unités en DC ou en DQM.
  Le Mage inspire tellement les unités combattantes qu’elles deviennent super performante pendant ce laps de temps.',
  'niveau' => 3, 'prix' => 14],
];
 ?>
