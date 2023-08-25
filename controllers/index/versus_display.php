<!------------------------->
<!-- HERO CREATION MODAL -->
<!------------------------->

<section class="versus">

    <div class="versus__side versus__side--left">

    <?php
    if (!empty($_SESSION['attacker'])) {
        $heroData = $heroRepository->findById($_SESSION['attacker']->getId());
        $attacker = $heroRepository->createById($heroData);
        $attacker->initialize();
    ?>

        <div class="caard">
            <div class="caard__stats">
                <p><span><?= $attacker->getName() ?></span></p>
                <p><?= $attacker->getClass() ?> lvl <?= $attacker->getLevel() ?><p>
                <p>attack: <?= $attacker->getStats()['attack'] ?></p>
                <p>defense: <?= $attacker->getStats()['defense'] ?></p>
                <p>evasion: <?= $attacker->getStats()['evasion'] ?></p>
                <p>critical: <?= $attacker->getStats()['critical'] ?></p>
                <p>speed: <?= $attacker->getStats()['speed'] ?></p>
                <p>regen: <?= $attacker->getStats()['regen'] ?></p>
            </div>
            <div class="caard__preview">
                <div class="card__preview--image"><img src="<?= $attacker->getImage() ?>"></div>
                <p>health: <?= $attacker->getHealth() ?> / <?= $attacker->getStats()['maxHealth'] ?></p>
                <p>energy: <?= $attacker->getEnergy() ?> / <?= $attacker->getStats()['maxEnergy'] ?></p>
            </div>
        </div>
        <form action="./controllers/index/versus_selection.php" method="get">
                <input type="hidden" name="removeAttacker_heroId" value="<?= $attacker->getId() ?>"> 
                <button type="submit"> Remove </button> 
        </form>

    <?php
    } else {
         echo '<div></div>';
    } ?>

    </div>

    <div class="versus__side--middle">
        <p>VS</p>
    </div>
    
    <div class="versus__side versus__side--right">

    <?php
    if (!empty($_SESSION['defender'])) {

        $heroData = $heroRepository->findById($_SESSION['defender']->getId());
        $defender = $heroRepository->createById($heroData);
        $defender->initialize();
    ?>

        <div class="caard">
            <div class="caard__preview">
                <div class="card__preview--image"><img src="<?= $defender->getImage() ?>"></div>
                <p>health: <?= $defender->getHealth() ?> / <?= $defender->getStats()['maxHealth'] ?></p>
                <p>energy: <?= $defender->getEnergy() ?> / <?= $defender->getStats()['maxEnergy'] ?></p>
            </div>
            <div class="caard__stats">
                <p><span><?= $defender->getName() ?></span></p>
                <p><?= $defender->getClass() ?> lvl <?= $defender->getLevel() ?><p>
                <p>attack: <?= $defender->getStats()['attack'] ?></p>
                <p>defense: <?= $defender->getStats()['defense'] ?></p>
                <p>evasion: <?= $defender->getStats()['evasion'] ?></p>
                <p>critical: <?= $defender->getStats()['critical'] ?></p>
                <p>speed: <?= $defender->getStats()['speed'] ?></p>
                <p>regen: <?= $defender->getStats()['regen'] ?></p>
            </div>
        </div>
        <form action="./controllers/index/versus_selection.php" method="get">
                <input type="hidden" name="removeDefender_heroId" value="<?= $defender->getId() ?>"> 
                <button type="submit"> Remove </button> 
        </form>

    <?php
    } else {
         echo '<div></div>';
    } ?>

    </div>
</section>