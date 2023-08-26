<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<?php
require('./config/db.php');
require('./config/autoload.php');
require('./config/variables.php');

session_start();
// $_SESSION['attacker'] = "";
// $_SESSION['defender'] = "";
// session_destroy();
?>

<body>
    <header class="text-center">
        <h1>Heroes fight</h1>
    </header>
    
    <div class="container d-flex flex-column align-items-center gap-5">

        <?php $heroRepository = new HeroRepository($db); ?>
        <?php include_once('./controllers/index/versus_display.php') ?>
        <?php include_once('./controllers/index/heroes_display.php') ?>
        <?php include_once('./controllers/index/modal_display.php') ?>
        
    </div>

    <footer>
        
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>