<!------------------------->
<!-- HERO CREATION MODAL -->
<!------------------------->

<section class="versus">

    <div class="container d-flex">

        <div class="versus__side versus__side--left">

        <?php
        if (!empty($_SESSION['attacker'])) {
            $heroData = $heroRepository->findById($_SESSION['attacker']->getId());
            $attacker = $heroRepository->createById($heroData);
            $attacker->initialize();
        ?>

            <div class="caard">
                <div class="caard__stats">
                    <p class="caard__stats--class"><span><?= $attacker->getClass() ?></span> lvl <span><?= $attacker->getLevel() ?></span><p>
                    <div class="d-flex gap-4">
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-column align-items-center">
                                <p>attack:</p>
                                <p class="text-white"><?= $attacker->getStats()['attack'] ?></p>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <p>defense:</p>
                                <p><?= $attacker->getStats()['defense'] ?></p>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <p>evasion:</p>
                                <p><?= $attacker->getStats()['evasion'] ?></p>
                            </div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="d-flex flex-column align-items-center">
                                <p>critical:</p>
                                <p><?= $attacker->getStats()['critical'] ?></p>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <p>speed:</p>
                                <p><?= $attacker->getStats()['speed'] ?></p>
                            </div>
                            <div class="d-flex flex-column align-items-center">
                                <p>regen:</p>
                                <p><?= $attacker->getStats()['regen'] ?></p>
                            </div>
                        </div>
                    <div>
                </div>

                <div class="caard__preview">
                    <div class="caard__preview--image"><img src="<?= $attacker->getImage() ?>"></div>
                    <p class="caard__preview--name"><span><?= $attacker->getName() ?></span></p>

                    <div class="progress caard__preview--health" role="progressbar" aria-valuenow="<?= $attacker->getHealth() ?>" aria-valuemin="0" aria-valuemax="<?= $attacker->getStats()['maxHealth'] ?>">
                        <?php $health_percentA = $attacker->getHealth() / $attacker->getStats()['maxHealth'] * 100; ?>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?= $health_percentA ?>%"><?= $attacker->getHealth() ?></div>
                    </div>

                    <div class="progress caard__preview--energy" role="progressbar" aria-valuenow="<?= $attacker->getEnergy() ?>" aria-valuemin="0" aria-valuemax="<?= $attacker->getStats()['maxEnergy'] ?>">
                        <?php $energy_percentA = $attacker->getEnergy() / $attacker->getStats()['maxEnergy'] * 100; ?>
                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: <?= $energy_percentA ?>%"><?= $attacker->getEnergy() ?></div>
                    </div>
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
                    <div class="caard__preview--image"><img src="<?= $defender->getImage() ?>"></div>
                    <p class="caard__preview--name"><span><?= $defender->getName() ?></span></p>

                    <div class="progress caard__preview--health" role="progressbar" aria-valuenow="<?= $defender->getHealth() ?>" aria-valuemin="0" aria-valuemax="<?= $defender->getStats()['maxHealth'] ?>">
                        <?php $health_percentD = $defender->getHealth() / $defender->getStats()['maxHealth'] * 100; ?>
                        <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?= $health_percentD ?>%"><?= $defender->getHealth() ?></div>
                    </div>

                    <div class="progress caard__preview--energy" role="progressbar" aria-valuenow="<?= $defender->getEnergy() ?>" aria-valuemin="0" aria-valuemax="<?= $defender->getStats()['maxEnergy'] ?>">
                        <?php $energy_percentD = $defender->getEnergy() / $defender->getStats()['maxEnergy'] * 100; ?>
                        <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: <?= $energy_percentD ?>%"><?= $defender->getEnergy() ?></div>
                    </div>
                </div>
                <div class="caard__stats">
                    <p class="caard__stats--class"><span><?= $defender->getClass() ?></span> lvl <span><?= $defender->getLevel() ?></span><p>
                    <div class="caard__stats--line">
                        <p>atk :</p>
                        <p><?= $defender->getStats()['attack'] ?></p>
                    </div>
                    <div class="caard__stats--line">
                        <p>def :</p>
                        <p><?= $defender->getStats()['defense'] ?></p>
                    </div>
                    <div class="caard__stats--line">
                        <p>eva :</p>
                        <p><?= $defender->getStats()['evasion'] ?></p>
                    </div>
                    <div class="caard__stats--line">
                        <p>crit :</p>
                        <p><?= $defender->getStats()['critical'] ?></p>
                    </div>
                    <div class="caard__stats--line">
                        <p>spd :</p>
                        <p><?= $defender->getStats()['speed'] ?></p>
                    </div>
                    <div class="caard__stats--line">
                        <p>rgn :</p>
                        <p><?= $defender->getStats()['regen'] ?></p>
                    </div>
                    
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

    </div>

</section>