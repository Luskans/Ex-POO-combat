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


    // SHOW COUNT OF ALL HEROES BY NAME

    public function showCountByName(string $name):int
    {
        $request = $this->db->prepare('SELECT COUNT(*) FROM heroes WHERE name = :name');
        $request->execute([
            'name' => $name
        ]);
        $count = $request->fetchColumn();

        return $count;
    }
    
    // SELECT ALL HEROES EXCEPT THOSES SELECTED IN VERSUS PANEL

    public function selectAllExceptVersus():array
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

    // SELECT A HERO FROM DATABASE BY HIS ID
 
    public function selectById(int $id):array
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

    // DELETE THE HERO SELECTED PREVIOUSLY

    public function delete(array $heroData)
    {
        $request = $this->db->prepare('DELETE FROM heroes WHERE id = :id');
        $request->execute([
            'id' => $heroData['id']
        ]);
    }

    // UPDATE THE HERO SELECTED PREVIOUSLY

    public function updateDatabase(array $heroData)
    {
        $request = $this->db->prepare('DELETE FROM heroes WHERE id = :id');
        $request->execute([
            'id' => $hero->getId()
        ]);
    }

    // ADD TO DATABASE A NEW HERO

    public function addDatabase(string $name, string $class, int $health)
    {
        $request = $this->db->prepare('INSERT INTO heroes (name, class, level, exp, health, energy) VALUES (:name, :class, :level, :exp, :health, :energy)');
        $request->execute([
            'name' => $name,
            'class' => $class,
            'level' => 1,
            'exp' => 0,
            'health' => $health,
            'energy' => 0
        ]);
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