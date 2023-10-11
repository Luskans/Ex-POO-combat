<?php

require('../../utilities/config/db.php');
require('../../utilities/config/autoload.php');
session_start();


////////// ADD HERO ON VERSUS PANEL

if (!empty($_GET['add_heroId']) && empty($_SESSION['attacker']) && empty($_SESSION['defender'])) {

    $heroRepository = new HeroRepository($db);
    $heroData = $heroRepository->selectById($_GET['add_heroId']);
    $_SESSION['attacker'] = $heroRepository->createById($heroData);

} elseif (!empty($_GET['add_heroId']) && !empty($_SESSION['attacker']) && empty($_SESSION['defender'])) {

    $heroRepository = new HeroRepository($db);
    $heroData = $heroRepository->selectById($_GET['add_heroId']);
    $_SESSION['defender'] = $heroRepository->createById($heroData);

} elseif (!empty($_GET['add_heroId']) && empty($_SESSION['attacker']) && !empty($_SESSION['defender'])) {

    $heroRepository = new HeroRepository($db);
    $heroData = $heroRepository->selectById($_GET['add_heroId']);
    $_SESSION['attacker'] = $heroRepository->createById($heroData);

} elseif (!empty($_GET['add_heroId']) && !empty($_SESSION['attacker']) && !empty($_SESSION['defender'])) {

    return "Both heroes are already selected.";
}


////////// REMOVE HERO FROM VERSUS PANEL

if (!empty($_GET['remove_attackerId'])) {
    $_SESSION['attacker'] = "";

} elseif (!empty($_GET['remove_defenderId'])) {
    $_SESSION['defender'] = ""; 
}

////////// REMOVE DEAD HEROE FROM VERSUS PANEL AFTER BATTLE

if (!empty($_GET['remove_looser'])) {
    $_SESSION['attacker'] = "";
    $_SESSION['defender'] = "";

    // $heroRepository = new HeroRepository($db);
    // $heroData = $heroRepository->selectById($_GET['remove_looser']);

    // $_SESSION['attacker'] = $heroRepository->createById($heroData);
    
}


header('Location: ../../index.php');