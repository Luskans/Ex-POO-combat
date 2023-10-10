<?php
if (isset($_SESSION['attacker'])): 
            $attackerData = $heroRepository->selectById($_SESSION['attacker']->getId());
            $attacker = $heroRepository->createById($attackerData);
            $attacker->initialize();
endif;
if (isset($_SESSION['defender'])): 
    $defenderData = $heroRepository->selectById($_SESSION['defender']->getId());
    $defender = $heroRepository->createById($defenderData);
    $defender->initialize();
endif;
?>


<section class="fighters">
    
        <!-------------- HEROES IMAGES ---------------------> 
        <div class="attackerHero">
            <img src="<?= $attacker->getImage(); ?>">
        </div>
        
        <div class="defenderHero">
            <img src="<?= $defender->getImage(); ?>">
        </div>
    
        <!-------------- HEALTH & ENERGY BAR --------------------->        
        <div class="stats d-flex justify-content-around align-items-center">
            <div class="stats__attacker d-flex flex-column text-center gap-1">
                <div class="progress health__attacker" role="progressbar" aria-valuenow="<?= $attacker->getHealth() ?>" aria-valuemin="0" aria-valuemax="<?= $attacker->getStats()['maxHealth'] ?>">
                    <?php $health_percentA = $attacker->getHealth() / $attacker->getStats()['maxHealth'] * 100; ?>
                    <div class="progress-bar bg-danger" style="width: <?= $health_percentA ?>%"><?= $attacker->getHealth() ?></div>
                </div>

                <div class="progress energy__attacker" role="progressbar" aria-valuenow="<?= $attacker->getEnergy() ?>" aria-valuemin="0" aria-valuemax="<?= $attacker->getStats()['maxEnergy'] ?>">
                    <?php $energy_percentA = $attacker->getEnergy() / $attacker->getStats()['maxEnergy'] * 100; ?>
                    <div class="progress-bar bg-info" style="width: <?= $energy_percentA ?>%"><?= $attacker->getEnergy() ?></div>
                </div>

                <p><?= $attacker->getName() ?></p>
            </div>

            <div class="stats__defender d-flex flex-column text-center gap-1">
                <div class="progress health__defender" role="progressbar" aria-valuenow="<?= $defender->getHealth() ?>" aria-valuemin="0" aria-valuemax="<?= $defender->getStats()['maxHealth'] ?>">
                    <?php $health_percentD = $defender->getHealth() / $defender->getStats()['maxHealth'] * 100; ?>
                    <div class="progress-bar bg-danger" style="width: <?= $health_percentD ?>%"><?= $defender->getHealth() ?></div>
                </div>

                <div class="progress energy__defender" role="progressbar" aria-valuenow="<?= $defender->getEnergy() ?>" aria-valuemin="0" aria-valuemax="<?= $defender->getStats()['maxEnergy'] ?>">
                    <?php $energy_percentD = $defender->getEnergy() / $defender->getStats()['maxEnergy'] * 100; ?>
                    <div class="progress-bar bg-info" style="width: <?= $energy_percentD ?>%"><?= $defender->getEnergy() ?></div>
                </div>

                <p><?= $defender->getName() ?></p>
            </div>
        </div>

        <!-------------- ANIMATION & DAMAGE ---------------------> 
        <div class="hitD"></div>
        <div class="hitA"></div>
        <div class="hitD2"></div>
        <div class="hitA2"></div>
        <p class="popup"></div>

        <!-------------- VICTORY --------------------->
        <div class="victoryA flex-column justify-content-center align-items-center">
            <p class="victoryD__winner">Winner :</p>
            <p class="victoryD__name"><?= $attacker->getName(); ?></p>

            <div class="d-flex flex-column">
                <p>Health regenerated: +<?= $attacker->getStats()['regen'] * 10 ?></p>
                <div class="progress health__attacker2" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="">
                    <div class="progress-bar bg-danger"></div>
                </div>

                <p>Experience gained: +<?= $defender->getExpGiven() ?></p>
                <div class="progress exp__attacker" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="">
                    <div class="progress-bar bg-warning"></div>
                </div>
            </div>

            <p class="levelUp">LEVEL UP !</p>
            <!-- <a href="./controllers/fight/fight_return.php"><button class="customButton">Next</button></a> -->
            <form action="./controllers/index/versus_selection.php" method="get">
                <input type="hidden" name="remove_looser" value="<?= $attacker->getId() ?>"> 
                <button class="customButton confirmAudio" type="submit">Next</button> 
            </form>
            <!-- <a href="./index.php"><button class="customButton">Next</button></a> -->
        </div>

        <div class="victoryD flex-column justify-content-center align-items-center">
            <p class="victoryD__winner">Winner :</p>
            <p class="victoryD__name"><?= $defender->getName(); ?></p>

            <div class="d-flex flex-column">
                <p>Health regenerated: <span>+<?= $defender->getStats()['regen'] * 10 ?></span></p>
                <div class="progress health__defender2" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="">
                    <div class="progress-bar bg-danger"></div>
                </div>

                <p>Experience gained: <span>+<?= $attacker->getExpGiven() ?></span></p>
                <div class="progress exp__defender" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="">
                    <div class="progress-bar bg-warning"></div>
                </div>
            </div>

            <p class="levelUp">LEVEL UP !</p>
            <!-- <button class="customButton next">Next</button> -->
            <form action="./controllers/index/versus_selection.php" method="get">
                <input type="hidden" name="remove_looser" value="<?= $defender->getId() ?>"> 
                <button class="customButton confirmAudio" type="submit">Next</button> 
            </form>
            <!-- <a href="./index.php"><button class="customButton">Next</button></a> -->
        </div>
    
</section>

<button class="battleStart"><img src="./utilities/images/others/sword3.png"></button>

<audio id="battleAudio" autoplay loop volume="0.1" src="./utilities/audios/battle.ogg"></audio>
<audio id="blowAudio" src="./utilities/audios/blow.ogg"></audio>
<audio id="slashAudio" src="./utilities/audios/slash.ogg"></audio>
<audio id="selectAudio" src="./utilities/audios/select.ogg"></audio>
<audio id="victoryAudio" src="./utilities/audios/victory.ogg"></audio>
<audio id="collapseAudio" src="./utilities/audios/collapse1.mp3"></audio>


