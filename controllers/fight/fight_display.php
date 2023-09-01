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
                    <div class="progress-bar bg-warning" style="width: <?= $energy_percentA ?>%"><?= $attacker->getEnergy() ?></div>
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
                    <div class="progress-bar bg-warning" style="width: <?= $energy_percentD ?>%"><?= $defender->getEnergy() ?></div>
                </div>

                <p><?= $defender->getName() ?></p>
            </div>
        </div>

        <div class="hitD"></div>
        <div class="hitA"></div>
        <p class="popup"></div>
        <!-- <p class="popupD">35</p>
        <p class="popupA">9</p> -->
    
</section>

<button class="battleStart"><img src="./images/sword3.png"></button>

<audio id="battleAudio" autoplay loop volume="0.1" src="./audios/battle.ogg" autoplay loop></audio>
<audio id="blowAudio" src="./audios/blow.ogg"></audio>
<audio id="slashAudio" src="./audios/slash.ogg"></audio>
<audio id="selectAudio" src="./audios/select.ogg"></audio>
<audio id="victoryAudio" src="./audios/victory.ogg"></audio>
<audio id="collapseAudio" src="./audios/collapse1.mp3"></audio>


