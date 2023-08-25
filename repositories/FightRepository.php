<?php

class FightManager
{


    ///// METHODS

    public function createMonster(string $name, int $health_point = 100):Monster
    {
        $monster = new Monster($name, $health_point);
        return $monster;
    }

    public function fight(Hero $hero, Monster $monster):array
    {
        $battleLog = [];
        while ($monster->getHealth_point() > 0 && $hero->getHealth_point() > 0) {
            $damageMonster = $monster->hit($hero);
            $battleLog[] = 'Le monstre ' . $monster->getName() . ' a infligé ' . $damageMonster . ' points de dégat à ' . $hero->getName() . ' ! Points de vie de ' . $hero->getName() . ' restant : ' . $hero->getHealth_point() . ' / 100 <br>';
            if ($hero->getHealth_point() > 0) {
                $damageHero = $hero->hit($monster);
                $battleLog[] = 'Le héro ' . $hero->getName() . ' a infligé ' . $damageHero . ' points de dégat à ' . $monster->getName() . ' ! Points de vie de ' . $monster->getName() . ' restant : ' . $monster->getHealth_point() . ' / 100 <br>';
            }
        }

        return $battleLog;
    }
}
