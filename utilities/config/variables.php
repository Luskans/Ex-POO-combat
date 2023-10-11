<?php

$imagesArray = array(
    'warrior' => './utilities/images/classes/doppelsoeldner_m.gif',
    'archer' => './utilities/images/classes/ranger_m.gif',
    'wizard' => './utilities/images/classes/sage_m.gif',
    'priest' => './utilities/images/classes/monk_m.gif',
    'monk' => './utilities/images/classes/nakmuay_m.gif',
    'duellist' => './utilities/images/classes/fencer_m.gif',
    'paladin' => './utilities/images/classes/hoplite_m.gif'
);

$descriptionsArray = array(
    'warrior' => 'Guerrier qui se bat au corps à corps.',
    'archer' => 'Archer qui tire à distance.',
    'wizard' => 'Sorcier qui envoie des boules de feu.',
    'priest' => 'Prêtre qui peut soigner ses alliés.',
    'monk' => 'Moine très rapide avec une bonne évasion.',
    'duellist' => 'Dueliste qui critique souvent.',
    'paladin' => 'Paladin avec une très bonne défence.'
);

$warriorStats = array(
    array(
        'maxHealth' => 115,
        'maxEnergy' => 10,
        'attack' => 9,
        'defense' => 5,
        'evasion' => 2,
        'critical' => 2,
        'speed' => 4,
        'regen' => 5
    ),
    array(
        'maxHealth' => 130,
        'maxEnergy' => 10,
        'attack' => 11,
        'defense' => 6,
        'evasion' => 2,
        'critical' => 2,
        'speed' => 4,
        'regen' => 6
    ),
    array(
        'maxHealth' => 145,
        'maxEnergy' => 10,
        'attack' => 13,
        'defense' => 7,
        'evasion' => 2,
        'critical' => 3,
        'speed' => 5,
        'regen' => 6
    ),
    array(
        'maxHealth' => 160,
        'maxEnergy' => 10,
        'attack' => 14,
        'defense' => 8,
        'evasion' => 3,
        'critical' => 3,
        'speed' => 5,
        'regen' => 7
    ),
    array(
        'maxHealth' => 175,
        'maxEnergy' => 10,
        'attack' => 16,
        'defense' => 9,
        'evasion' => 3,
        'critical' => 3,
        'speed' => 6,
        'regen' => 7
    )
);

$archerStats = array(
    array(
        'maxHealth' => 90,
        'maxEnergy' => 10,
        'attack' => 11,
        'defense' => 3,
        'evasion' => 3,
        'critical' => 3,
        'speed' => 5,
        'regen' => 4
    ),
    array(
        'maxHealth' => 100,
        'maxEnergy' => 10,
        'attack' => 13,
        'defense' => 3,
        'evasion' => 4,
        'critical' => 3,
        'speed' => 6,
        'regen' => 4
    ),
    array(
        'maxHealth' => 110,
        'maxEnergy' => 10,
        'attack' => 15,
        'defense' => 4,
        'evasion' => 4,
        'critical' => 4,
        'speed' => 6,
        'regen' => 5
    ),
    array(
        'maxHealth' => 120,
        'maxEnergy' => 10,
        'attack' => 17,
        'defense' => 4,
        'evasion' => 5,
        'critical' => 4,
        'speed' => 7,
        'regen' => 5
    ),
    array(
        'maxHealth' => 130,
        'maxEnergy' => 10,
        'attack' => 19,
        'defense' => 5,
        'evasion' => 5,
        'critical' => 4,
        'speed' => 7,
        'regen' => 6
    )
);

$wizardStats = array(
    array(
        'maxHealth' => 90,
        'maxEnergy' => 10,
        'attack' => 12,
        'defense' => 4,
        'evasion' => 2,
        'critical' => 2,
        'speed' => 5,
        'regen' => 4
    ),
    array(
        'maxHealth' => 100,
        'maxEnergy' => 10,
        'attack' => 15,
        'defense' => 4,
        'evasion' => 2,
        'critical' => 3,
        'speed' => 6,
        'regen' => 4
    ),
    array(
        'maxHealth' => 110,
        'maxEnergy' => 10,
        'attack' => 17,
        'defense' => 5,
        'evasion' => 3,
        'critical' => 3,
        'speed' => 6,
        'regen' => 5
    ),
    array(
        'maxHealth' => 120,
        'maxEnergy' => 10,
        'attack' => 20,
        'defense' => 5,
        'evasion' => 3,
        'critical' => 4,
        'speed' => 6,
        'regen' => 5
    ),
    array(
        'maxHealth' => 130,
        'maxEnergy' => 10,
        'attack' => 22,
        'defense' => 6,
        'evasion' => 4,
        'critical' => 4,
        'speed' => 7,
        'regen' => 6
    )
);

$priestStats = array(
    array(
        'maxHealth' => 100,
        'maxEnergy' => 10,
        'attack' => 8,
        'defense' => 5,
        'evasion' => 2,
        'critical' => 2,
        'speed' => 4,
        'regen' => 7
    ),
    array(
        'maxHealth' => 115,
        'maxEnergy' => 10,
        'attack' => 9,
        'defense' => 5,
        'evasion' => 2,
        'critical' => 2,
        'speed' => 5,
        'regen' => 8
    ),
    array(
        'maxHealth' => 125,
        'maxEnergy' => 10,
        'attack' => 11,
        'defense' => 6,
        'evasion' => 3,
        'critical' => 3,
        'speed' => 5,
        'regen' => 9
    ),
    array(
        'maxHealth' => 140,
        'maxEnergy' => 10,
        'attack' => 12,
        'defense' => 6,
        'evasion' => 3,
        'critical' => 3,
        'speed' => 5,
        'regen' => 10
    ),
    array(
        'maxHealth' => 150,
        'maxEnergy' => 10,
        'attack' => 14,
        'defense' => 7,
        'evasion' => 4,
        'critical' => 3,
        'speed' => 6,
        'regen' => 11
    )
);

$monkStats = array(
    array(
        'maxHealth' => 110,
        'maxEnergy' => 10,
        'attack' => 10,
        'defense' => 3,
        'evasion' => 4,
        'critical' => 2,
        'speed' => 6,
        'regen' => 5
    ),
    array(
        'maxHealth' => 125,
        'maxEnergy' => 10,
        'attack' => 12,
        'defense' => 3,
        'evasion' => 5,
        'critical' => 2,
        'speed' => 6,
        'regen' => 6
    ),
    array(
        'maxHealth' => 135,
        'maxEnergy' => 10,
        'attack' => 13,
        'defense' => 4,
        'evasion' => 5,
        'critical' => 3,
        'speed' => 7,
        'regen' => 7
    ),
    array(
        'maxHealth' => 150,
        'maxEnergy' => 10,
        'attack' => 15,
        'defense' => 4,
        'evasion' => 6,
        'critical' => 3,
        'speed' => 7,
        'regen' => 7
    ),
    array(
        'maxHealth' => 165,
        'maxEnergy' => 10,
        'attack' => 17,
        'defense' => 4,
        'evasion' => 6,
        'critical' => 4,
        'speed' => 8,
        'regen' => 8
    )
);

$duellistStats = array(
    array(
        'maxHealth' => 100,
        'maxEnergy' => 10,
        'attack' => 10,
        'defense' => 3,
        'evasion' => 2,
        'critical' => 4,
        'speed' => 6,
        'regen' => 4
    ),
    array(
        'maxHealth' => 110,
        'maxEnergy' => 10,
        'attack' => 12,
        'defense' => 3,
        'evasion' => 3,
        'critical' => 5,
        'speed' => 7,
        'regen' => 4
    ),
    array(
        'maxHealth' => 120,
        'maxEnergy' => 10,
        'attack' => 13,
        'defense' => 4,
        'evasion' => 3,
        'critical' => 6,
        'speed' => 7,
        'regen' => 5
    ),
    array(
        'maxHealth' => 130,
        'maxEnergy' => 10,
        'attack' => 15,
        'defense' => 4,
        'evasion' => 4,
        'critical' => 6,
        'speed' => 8,
        'regen' => 5
    ),
    array(
        'maxHealth' => 140,
        'maxEnergy' => 10,
        'attack' => 16,
        'defense' => 4,
        'evasion' => 4,
        'critical' => 7,
        'speed' => 8,
        'regen' => 6
    )
);

$paladinStats = array(
    array(
        'maxHealth' => 100,
        'maxEnergy' => 10,
        'attack' => 9,
        'defense' => 6,
        'evasion' => 1,
        'critical' => 2,
        'speed' => 3,
        'regen' => 5
    ),
    array(
        'maxHealth' => 110,
        'maxEnergy' => 10,
        'attack' => 10,
        'defense' => 7,
        'evasion' => 2,
        'critical' => 2,
        'speed' => 3,
        'regen' => 6
    ),
    array(
        'maxHealth' => 120,
        'maxEnergy' => 10,
        'attack' => 12,
        'defense' => 8,
        'evasion' => 2,
        'critical' => 2,
        'speed' => 4,
        'regen' => 7
    ),
    array(
        'maxHealth' => 130,
        'maxEnergy' => 10,
        'attack' => 13,
        'defense' => 9,
        'evasion' => 2,
        'critical' => 3,
        'speed' => 4,
        'regen' => 8
    ),
    array(
        'maxHealth' => 140,
        'maxEnergy' => 10,
        'attack' => 15,
        'defense' => 10,
        'evasion' => 2,
        'critical' => 3,
        'speed' => 4,
        'regen' => 9
    )
);
