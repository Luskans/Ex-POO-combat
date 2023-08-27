<?php

require('../../config/db.php');
require('../../config/autoload.php');

session_start();
$_SESSION['creationError'] = 0;

if (!empty($_POST['delete_heroId'])) {

    $heroRepository = new HeroRepository($db);
    $heroData = $heroRepository->selectById($_POST['delete_heroId']);
    $heroRepository->delete($heroData);
}

header('Location: ../../index.php');