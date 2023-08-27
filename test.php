<div class="progress mb-1" role="progressbar" style="width: 80%; height: 10px" aria-valuenow="<?= $hero->getHealth() ?>" aria-valuemin="0" aria-valuemax="<?= $hero->getStats()['maxHealth'] ?>">
    <?php $health_percent = $hero->getHealth() / $hero->getStats()['maxHealth'] * 100; ?>
    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?= $health_percent ?>%"><?= $hero->getHealth() ?></div>
</div>
<div class="progress mb-3" role="progressbar" style="width: 80%; height: 10px" aria-valuenow="<?= $hero->getEnergy() ?>" aria-valuemin="0" aria-valuemax="<?= $hero->getStats()['maxEnergy'] ?>">
    <?php $energy_percent = $hero->getEnergy() / $hero->getStats()['maxEnergy'] * 100; ?>
    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: <?= $energy_percent ?>%"><?= $hero->getEnergy() ?></div>
</div>

<div class="progress management__card--health" role="progressbar" style="width: 80%; height: 10px" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
    <?php $health_percent = $hero->getHealth() / $hero->getStats()['maxHealth'] * 100; ?>
    <div class="progress-bar bg-danger progress-bar-striped progress-bar-animated" style="width: <?= $health_percent ?>%"><?= $hero->getHealth() ?></div>
</div>

<div class="progress management__card--energy" role="progressbar" style="width: 80%; height: 10px" aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">
    <?php $energy_percent = $hero->getEnergy() / $hero->getStats()['maxEnergy'] * 100; ?>
    <div class="progress-bar bg-info progress-bar-striped progress-bar-animated" style="width: <?= $energy_percent ?>%"><?= $hero->getEnergy() ?></div>
</div>

<p>attack: <?= $defender->getStats()['attack'] ?></p>
<p>defense: <?= $defender->getStats()['defense'] ?></p>
<p>evasion: <?= $defender->getStats()['evasion'] ?></p>
<p>critical: <?= $defender->getStats()['critical'] ?></p>
<p>speed: <?= $defender->getStats()['speed'] ?></p>
<p>regen: <?= $defender->getStats()['regen'] ?></p>