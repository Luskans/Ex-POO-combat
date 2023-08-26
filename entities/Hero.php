<?php
// require('./config/variables.php');

class Hero {
    private int $id;
    private string $name;
    private string $class;
    private int $level;
    private int $exp;
    private int $maxExp = 100;
    private int $expGiven = 0;
    private string $image = "";
    private string $description = "";
    private int $health = 100;
    private int $energy = 10;
    private array $stats = [];

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    /////////////////////////////
    ///// GETTERS & SETTERS /////
    ////////////////////////////
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function getClass() {
        return $this->class;
    }

    public function setClass($class) {
        $this->class = $class;
        return $this;
    }

    public function getLevel() {
        return $this->level;
    }
 
    public function setLevel($level) {
        $this->level = $level;
        return $this;
    }

    public function getExp() {
        return $this->exp;
    }

    public function setExp($exp) {
        $this->exp = $exp;
        return $this;
    }
 
    public function getMaxExp() {
        return $this->maxExp;
    }

    public function setMaxExp($maxExp) {
        $this->maxExp = $maxExp;
        return $this;
    }

    public function getExpGiven() {
        return $this->expGiven;
    }

    public function setExpGiven($expGiven) {
        $this->expGiven = $expGiven;
        return $this;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
        return $this;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

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

    public function getStats() {
        return $this->stats;
    }

    public function setStats($stats) {
        $this->stats = $stats;
        return $this;
    }

    ////////////////////
    ///// METHODS /////
    //////////////////

    public function hydrate(array $data)
    {
        if (isset($data["id"])) {
            $this->setId($data["id"]);
        }
        if (isset($data["name"])) {
            $this->setName($data["name"]);
        }
        if (isset($data["class"])) {
            $this->setClass($data["class"]);
        }
        if (isset($data["level"])) {
            $this->setLevel($data["level"]);
        }
        if (isset($data["exp"])) {
            $this->setExp($data["exp"]);
        }
        if (isset($data["health"])) {
            $this->setExp($data["health"]);
        }
        if (isset($data["energy"])) {
            $this->setExp($data["energy"]);
        }
    }
    
    // INITIALIZE ALL PROPERTIES OF A HERO

    public function initialize()
    {
        require('./config/variables.php');

        $this->setMaxExp(100 * $this->getLevel());
        $this->setExpGiven(($this->getLevel() * 40));

        if ($this->getClass() === "Warrior") {
            $this->setImage($imagesArray['warrior']);
            $this->setDescription($descriptionsArray['warrior']);
            $this->setStats($warriorStats[$this->getLevel() - 1]);
        }
        if ($this->getClass() === "Archer") {
            $this->setImage($imagesArray['archer']);
            $this->setDescription($descriptionsArray['archer']);
            $this->setStats($archerStats[$this->getLevel() - 1]);
        }
        if ($this->getClass() === "Wizard") {
            $this->setImage($imagesArray['wizard']);
            $this->setDescription($descriptionsArray['wizard']);
            $this->setStats($wizardStats[$this->getLevel() - 1]);
        }
        if ($this->getClass() === "Priest") {
            $this->setImage($imagesArray['priest']);
            $this->setDescription($descriptionsArray['priest']);
            $this->setStats($priestStats[$this->getLevel() - 1]);
        }
    }

    // GIVE EXP, LEVEL AND INITIALIZE A HERO

    public function getExperience(Hero $opponent)
    {   
        $difference = ($this->getLevel() - $opponent->getLevel()) / 10;
        $this->setExp($this->getExp() + ($opponent->getExpGiven() * (1 + $difference)));
        
        if ($this->getExp() >= $this->getMaxExp()) {
            $this->setLevel($this->getLevel() + 1);
            $this->initialize();
        }
    }

    // VARIABLES

    
}