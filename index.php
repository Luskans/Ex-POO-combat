<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./utilities/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<?php
require('./utilities/config/db.php');
require('./utilities/config/autoload.php');
require('./utilities/config/variables.php');

session_start();
if (!isset($_SESSION['attacker']) && !isset($_SESSION['defender']) && !isset($_SESSION['creationError'])) {
    $_SESSION['attacker'] = "";
    $_SESSION['defender'] = "";
    $_SESSION['creationError'] = 0;
}
// var_dump($_SESSION['attacker']);
// var_dump($_SESSION['defender']);
// session_destroy();
// echo '<script>';
// echo 'location.reload(true);'; // Recharge la page en ignorant le cache
// echo 'localStorage.clear();';   // Vide le localStorage
// echo '</script>';
?>

<body>
    <header class="d-flex flex-column justify-content-center align-items-center">
        <img src="./utilities/images/others/title1.png">
        <img src="./utilities/images/others/title2.png">

        <div class="animation-wrapper">
            <div class="particle particle-1"></div>
            <div class="particle particle-2"></div>
            <div class="particle particle-3"></div>
            <div class="particle particle-4"></div>
        </div>
    </header>
    
    <main class="d-flex flex-column align-items-center gap-5">
        <?php $heroRepository = new HeroRepository($db); ?>
        <?php include_once('./vues/index/versus_display.php') ?>
        <?php include_once('./vues/index/heroes_display.php') ?>
        <?php include_once('./vues/index/modals_display.php') ?>

        <audio id="menuAudio" volume="0.1" src="./utilities/audios/menu.ogg" autoplay loop></audio>
        <audio id="slashAudio" src="./utilities/audios/slash.ogg"></audio>
        <audio id="selectAudio" src="./utilities/audios/select.ogg"></audio>
        <audio id="cancelAudio" src="./utilities/audios/cancel.ogg"></audio>
       
    </main>
    
    <footer class="d-flex justify-content-center align-items-center">
        <p>Copyright &copy; 2023 - Sylvain</p>
    </footer>

    <script type="module" src="./utilities/js/index.js"></script>
</body>

</html>