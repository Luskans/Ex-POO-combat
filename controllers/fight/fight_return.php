<?php

var_dump($_POST, $GLOBALS);
// Récupérer les données JSON depuis la requête POST
$jsonDatas = file_get_contents('php://input');

// Décoder les données JSON en un tableau associatif
$datas = json_decode($jsonDatas, true);

// Accéder aux objets et à leurs propriétés
// $objet1 = json_decode($data['objet1']);
// $objet2 = json_decode($data['objet2']);

var_dump($jsonDatas);
var_dump($datas);

