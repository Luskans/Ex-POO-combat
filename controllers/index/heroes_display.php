<!--------------------------->
<!-- DISPLAY OF ALL HEROES -->
<!--------------------------->

<section class="management">

    <div class="management__card management__card--new">
        <p>Create a new character</p>
        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path d="M64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 
                64-64V96c0-35.3-28.7-64-64-64H64zM200 344V280H136c-13.3 0-24-10.7-24-24s10.7-24 
                24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 
                24-24 24H248v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg>
        </a>
    </div>

    
<?php
$heroesData = $heroRepository->findAllByLevel();
$heroesArray = $heroRepository->createAll($heroesData);
foreach ($heroesArray as $hero) {
    $hero->initialize();
?>

    <div class="management__card">
        <div class="management__card--image"><img src="<?= $hero->getImage() ?>"></div>
        <p class="management__card--name"><span><?= $hero->getName() ?></span> lvl <?= $hero->getLevel() ?></p>
        <div class="progress" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
            <?php $percent = $hero->getHealth() * $hero->getStats()['maxHealth'] / 100; ?>
            <div class="progress-bar bg-danger" style="width: <?= $percent ?>%"></div>
        </div>
        <p>health: <?= $hero->getHealth() ?> / <?= $hero->getStats()['maxHealth'] ?></p>
        <p>energy: <?= $hero->getEnergy() ?> / <?= $hero->getStats()['maxEnergy'] ?></p>
        <div class="management__card--buttons">
            <form action="./controllers/index/versus_selection.php" method="get">
                <input type="hidden" name="add_heroId" value="<?= $hero->getId() ?>"> 
                <button class="management__card--button" type="submit"> Choose </button> 
            </form>
            <form action="./controllers/index/hero_delete.php" method="get">
                <input type="hidden" name="heroId" value="<?= $hero->getId() ?>"> 
                <button class="management__card--button" type="submit"> Delete </button> 
            </form>
        </div>
    </div>

<?php } ?>

</section>