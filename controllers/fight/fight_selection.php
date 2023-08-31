<?php

require('../../config/db.php');
require('../../config/autoload.php');
require('../../config/variables.php');

session_start();


////////// ENCODE IN JSON ATTACKER & DEFENDER

$heroRepository = new HeroRepository($db);

if (isset($_SESSION['attacker']) && isset($_SESSION['defender'])) {
    $attackerData = $heroRepository->selectById($_SESSION['attacker']->getId());
    $attacker = $heroRepository->createById($attackerData);
    $attacker->initialize();

    $defenderData = $heroRepository->selectById($_SESSION['defender']->getId());
    $defender = $heroRepository->createById($defenderData);
    $defender->initialize();
}

$encodedData = array(
    'attacker' => array(
        'id' => $attacker->getId(),
        'name' => $attacker->getName(),
        'class' => $attacker->getClass(),
        'level' => $attacker->getLevel(),
        'exp' => $attacker->getExp(),
        'maxExp' => $attacker->getMaxExp(),
        'expGiven' => $attacker->getExpGiven(),
        'image' => $attacker->getImage(),
        'description' => $attacker->getDescription(),
        'health' => $attacker->getHealth(),
        'energy' => $attacker->getEnergy(),
        'stats' => $attacker->getStats()
    ),
    'defender' => array(
        'id' => $defender->getId(),
        'name' => $defender->getName(),
        'class' => $defender->getClass(),
        'level' => $defender->getLevel(),
        'exp' => $defender->getExp(),
        'maxExp' => $defender->getMaxExp(),
        'expGiven' => $defender->getExpGiven(),
        'image' => $defender->getImage(),
        'description' => $defender->getDescription(),
        'health' => $defender->getHealth(),
        'energy' => $defender->getEnergy(),
        'stats' => $defender->getStats()
    )
);

header('Content-Type: application/json');
echo json_encode($encodedData); 


// header('Location: ../../test.php');