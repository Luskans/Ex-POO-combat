<?php
require('variables.php');

class StatsRepository {

    public function create(object $hero) {
        if ($hero['class'] == 'warrior' && $hero['level'] == 1) {
            $warriorStats = new Stats($warriorStats);
        }
    }
}