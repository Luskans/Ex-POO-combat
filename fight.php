<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<?php
require('./config/db.php');
require('./config/autoload.php');
require('./config/variables.php');

session_start();
if (!isset($_SESSION['attacker']) && !isset($_SESSION['defender']) && !isset($_SESSION['creationError'])) {
    $_SESSION['attacker'] = "";
    $_SESSION['defender'] = "";
    $_SESSION['creationError'] = 0;
}
// session_destroy();


// echo '<script>';
// echo 'location.reload(true);'; // Recharge la page en ignorant le cache
// echo 'localStorage.clear();';   // Vide le localStorage
// echo '</script>';
?>

<body>
    <?php $heroRepository = new HeroRepository($db); ?>
    <?php include_once('./controllers/fight/background_display.php'); ?>
    <?php include_once('./controllers/fight/fight_display.php'); ?>

    <canvas id="canvas"></canvas>


    
    
    <script type="module" src="./firework.js"></script>
    <script type="module" src="./fight.js"></script>
</body>

</html>