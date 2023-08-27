<!--------------------------->
<!-- DISPLAY OF ALL HEROES -->
<!--------------------------->

<section class="management">

    <div class="container d-flex justify-content-center gap-4">

        <div class="management__card management__card--new">
            <p>Create a new character</p>
            <a data-bs-toggle="modal" data-bs-target="#creationModal">
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

            <div class="progress management__card--health" role="progressbar" aria-valuenow="<?= $hero->getHealth() ?>" aria-valuemin="0" aria-valuemax="<?= $hero->getStats()['maxHealth'] ?>">
                <?php $health_percent = $hero->getHealth() / $hero->getStats()['maxHealth'] * 100; ?>
                <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?= $health_percent ?>%"><?= $hero->getHealth() ?></div>
            </div>
            <div class="progress management__card--energy" role="progressbar" aria-valuenow="<?= $hero->getEnergy() ?>" aria-valuemin="0" aria-valuemax="<?= $hero->getStats()['maxEnergy'] ?>">
                <?php $energy_percent = $hero->getEnergy() / $hero->getStats()['maxEnergy'] * 100; ?>
                <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: <?= $energy_percent ?>%"><?= $hero->getEnergy() ?></div>
            </div>

            <div class="management__card--buttons">
                <form action="./controllers/index/versus_selection.php" method="get">
                    <input type="hidden" name="add_heroId" value="<?= $hero->getId() ?>"> 
                    <button class="management__card--button" type="submit"> Choose </button> 
                </form>
          
                <button class="management__card--close btn-close" data-bs-toggle="modal" data-bs-target="#deleteModal"></button> 
                <!-- <form action="./controllers/index/hero_delete.php" method="get">
                    <input type="hidden" name="heroId" value="<?= $hero->getId() ?>"> 
                    <button class="management__card--close btn-close" type="submit"></button> 
                </form> -->
            </div>
        </div>

    <?php } ?>

    </div>

</section>