<?php

$requestData = json_decode(file_get_contents('php://input'), true);

// Faites quelque chose avec les données reçues du JavaScript

// Pour renvoyer une réponse en JSON
header('Content-Type: application/json');
echo json_encode(array('message' => 'Données reçues et traitées.'));
?>
