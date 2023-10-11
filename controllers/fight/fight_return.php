<?php

require('../../utilities/config/db.php');
require('../../utilities/config/autoload.php');
// require('../../utilities/config/variables.php');

// var_dump($_POST, $GLOBALS);
// Récupérer les données JSON depuis la requête POST
$jsonDatas = file_get_contents('php://input');

// Décoder les données JSON en un tableau associatif
$datas = json_decode($jsonDatas, true);

// var_dump($jsonDatas);
// var_dump($datas);

$heroRepository = new HeroRepository($db);

if ($datas[0]['health'] <= 0) {
    // $heroRepository = new HeroRepository($db);

    $deadHero = $heroRepository->selectById($datas[0]['id']);
    $heroRepository->delete($deadHero);

    // $victoriousHero = $heroRepository->selectById($datas[1]['id']);
    $heroRepository->update($datas[1]);

} elseif ($datas[1]['health'] <= 0) {
    // $heroRepository = new HeroRepository($db);

    $deadHero = $heroRepository->selectById($datas[1]['id']);
    $heroRepository->delete($deadHero);

    // $victoriousHero = $heroRepository->selectById($datas[0]['id']);
    // $heroRepository->update($victoriousHero);
    $heroRepository->update($datas[0]);
}