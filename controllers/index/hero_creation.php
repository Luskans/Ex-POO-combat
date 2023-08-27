<?php

require('../../config/db.php');
require('../../config/autoload.php');
require('../../config/variables.php');

session_start();
$_SESSION['creationError'] = 0;


if ($_POST['class'] === 'Warrior') {
    $startHeal = $warriorStats[0]['maxHealth'];

} elseif ($_POST['class'] === 'Archer') {
    $startHeal = $archerStats[0]['maxHealth'];

} elseif ($_POST['class'] === 'Wizard') {
    $startHeal = $wizardStats[0]['maxHealth'];

} elseif ($_POST['class'] === 'Priest') {
    $startHeal = $priestStats[0]['maxHealth'];

} elseif ($_POST['class'] === 'Monk') {
    $startHeal = $monkStats[0]['maxHealth'];

} elseif ($_POST['class'] === 'Duellist') {
    $startHeal = $duellistStats[0]['maxHealth'];

} elseif ($_POST['class'] === 'Paladin') {
    $startHeal = $paladinStats[0]['maxHealth'];

} else {
    $startHeal = 0;
}


if (!empty($_POST['name']) && (!empty($_POST['class']))) {
    $heroRepository = new HeroRepository($db);
    $count = $heroRepository->showCountByName($_POST['name']);

    if ($count > 0) {
        $_SESSION['creationError'] = 1;

    } else {
        $heroRepository = new HeroRepository($db);
        $heroRepository->addDatabase($_POST['name'], $_POST['class'], $startHeal);
    }

} else {
    $_SESSION['creationError'] = 2;
}

header('Location: ../../index.php');