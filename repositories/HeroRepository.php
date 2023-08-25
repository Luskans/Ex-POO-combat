<?php
// require('../config/variables.php');

class HeroRepository {
    private PDO $db;

    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    ////////////////////////
    ///// GET & SET db /////
    ////////////////////////

    public function getDb()
    {
        return $this->db;
    }

    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }

    ///////////////////
    ///// METHODS /////
    //////////////////

    
    // SELECT ALL HEROES EXCEPT THOSES SELECTED IN VERSUS PANEL

    public function findAllByLevel():array
    {
        if ($_SESSION['attacker'] != "" && $_SESSION['defender'] != "" ) {

            $request = $this->db->prepare('SELECT * FROM heroes WHERE id NOT IN (:attackerId, :defenderId) ORDER BY level DESC');
            $request->execute([
                'attackerId' => $_SESSION['attacker']->getId(),
                'defenderId' => $_SESSION['defender']->getId()
            ]);
            $heroesData = $request->fetchAll(PDO::FETCH_ASSOC);

        } elseif ($_SESSION['attacker'] != "" && $_SESSION['defender'] === "" ) {

            $request = $this->db->prepare('SELECT * FROM heroes WHERE NOT id = :attackerId ORDER BY level DESC');
            $request->execute([
                'attackerId' => $_SESSION['attacker']->getId()
            ]);
            $heroesData = $request->fetchAll(PDO::FETCH_ASSOC);

        } elseif ($_SESSION['attacker'] === "" && $_SESSION['defender'] != "" ) {

            $request = $this->db->prepare('SELECT * FROM heroes WHERE NOT id = :defenderId ORDER BY level DESC');
            $request->execute([
                'defenderId' => $_SESSION['defender']->getId()
            ]);
            $heroesData = $request->fetchAll(PDO::FETCH_ASSOC);

        } else {

            $request = $this->db->query('SELECT * FROM heroes ORDER BY level DESC');
            $heroesData = $request->fetchAll(PDO::FETCH_ASSOC);
        }

        return $heroesData;
    }

    // CREATE ALL HEROES SELECTED PREVIOUSLY

    public function createAll(array $heroesData):array
    {
        $heroesArray = [];
        foreach ($heroesData as $heroData) {
            $heroesArray[] = new Hero($heroData);
        }

        return $heroesArray;
    }

    // SELECT AN HERO BY HIS ID
 
    public function findById(int $id):array
    {
        $request = $this->db->prepare('SELECT * FROM heroes WHERE id = :id');
        $request->execute([
            'id' => $id
        ]);
        $heroData = $request->fetch();

        return $heroData;
    }

    // CREATE THE HERO SELECTED PREVIOUSLY

    public function createById(array $heroData):Hero
    {
        $hero = new Hero($heroData);

        return $hero;
    }

    // ADD TO DATABASE A HERO

    public function add(Hero $hero)
    {
        $request = $this->db->prepare('INSERT INTO heroes (name, class, level, exp) VALUES (:name, :class, :level, :exp)');
        $request->execute([
            'name' => $hero->getName(),
            'class' => $hero->getClass(),
            'level' => $hero->getLevel(),
            'exp' => $hero->getExp()
        ]);

        $id = $this->db->lastInsertId();
        $hero->setId($id);
    }

    // public function update(Hero $hero)
    // {
    //     $request = $this->db->prepare('UPDATE heroes SET health_point = :health_point WHERE id = :id');
    //     $request->execute([
    //         'health_point' => $hero->getHealth(),
    //         'id' => $hero->getId()
    //     ]);
    // }

}