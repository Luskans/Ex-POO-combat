<?php

class Stats {
    private int $maxHealth;
    private int $maxEnergy;
    private int $attack;
    private int $defense;
    private int $evasion;
    private int $critical;
    private int $speed;
    private int $regen;

    public function __construct(array $classStats) {
        $this->setHealth($classStats['health']);
        $this->setEnergy($classStats['energy']);
        $this->setAttack($classStats['attack']);
        $this->setDefense($classStats['defense']);
        $this->setEvasion($classStats['evasion']);
        $this->setCritical($classStats['critical']);
        $this->setSpeed($classStats['speed']);
        $this->setRegen($classStats['regen']);
    }

    // public function __construct(array $classStats, int $level) {
    //     $this->setHealth($classStats[$level-1]['health']);
    //     $this->setEnergy($classStats[$level-1]['energy']);
    //     $this->setAttack($classStats[$level-1]['attack']);
    //     $this->setDefense($classStats[$level-1]['defense']);
    //     $this->setEvasion($classStats[$level-1]['evasion']);
    //     $this->setCritical($classStats[$level-1]['critical']);
    //     $this->setSpeed($classStats[$level-1]['speed']);
    //     $this->setRegen($classStats[$level-1]['regen']);
    // }


    ////////// GETTER & SETTER

    public function getHealth() {
        return $this->health;
    }

    public function setHealth($health) {
        $this->health = $health;
        return $this;
    }

    public function getEnergy() {
        return $this->energy;
    }

    public function setEnergy($energy) {
        $this->energy = $energy;
        return $this;
    }

    public function getAttack() {
        return $this->attack;
    }

    public function setAttack($attack) {
        $this->attack = $attack;
        return $this;
    }

    public function getDefense() {
        return $this->defense;
    }

    public function setDefense($defense) {
        $this->defense = $defense;
        return $this;
    }

    public function getEvasion() {
        return $this->evasion;
    }

    public function setEvasion($evasion) {
        $this->evasion = $evasion;
        return $this;
    }

    public function getCritical() {
        return $this->critical;
    }

    public function setCritical($critical) {
        $this->critical = $critical;
        return $this;
    }

    public function getSpeed() {
        return $this->speed;
    }

    public function setSpeed($speed) {
        $this->speed = $speed;
        return $this;
    }

    public function getRegen() {
        return $this->regen;
    }

    public function setRegen($regen) {
        $this->regen = $regen;
        return $this;
    }

    ///// METHODS
    
    public function hit(Monster $monster):int
    {
        $damage = rand(0, 50);
        $monsterHealth_point = $monster->getHealth_point();
        $monster->setHealth_point($monsterHealth_point - $damage);

        return $damage;
    }
}