<?php

require('../../config/db.php');
require('../../config/autoload.php');
session_start();


////////// ADD HERO ON VERSUS PANEL

if (!empty($_GET['add_heroId']) && empty($_SESSION['attacker']) && empty($_SESSION['defender'])) {

    $heroRepository = new HeroRepository($db);
    $heroData = $heroRepository->findById($_GET['add_heroId']);
    $_SESSION['attacker'] = $heroRepository->createById($heroData);

} elseif (!empty($_GET['add_heroId']) && !empty($_SESSION['attacker']) && empty($_SESSION['defender'])) {

    $heroRepository = new HeroRepository($db);
    $heroData = $heroRepository->findById($_GET['add_heroId']);
    $_SESSION['defender'] = $heroRepository->createById($heroData);

} elseif (!empty($_GET['add_heroId']) && empty($_SESSION['attacker']) && !empty($_SESSION['defender'])) {

    $heroRepository = new HeroRepository($db);
    $heroData = $heroRepository->findById($_GET['add_heroId']);
    $_SESSION['attacker'] = $heroRepository->createById($heroData);

} elseif (!empty($_GET['add_heroId']) && !empty($_SESSION['attacker']) && !empty($_SESSION['defender'])) {

    return "Both heroes are already selected.";
}


////////// REMOVE HERO FROM VERSUS PANEL

if (!empty($_GET['removeAttacker_heroId'])) {
    $_SESSION['attacker'] = "";

} elseif (!empty($_GET['removeDefender_heroId'])) {
    $_SESSION['defender'] = ""; 
}


header('Location: ../../index.php');