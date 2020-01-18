<?php

require_once __DIR__.'/../Database.php';


class Candidate {
    public $id;
    private $name;
    private $age;
    private $location;
    private $game;
    private $gender;
    private $image;

    private $database;

    public function __construct(int $id, string $name, int $age, string $location, string $game,string $gender, string $image)
    {
        $this->id = $id;
        $this->name = $name;
        $this->age = $age;
        $this->location = $location;
        $this->game = $game;
        $this->gender = $gender;
        $this->image = $image;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getGame(): string
    {
        return $this->game;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function like() {



        $this->database = new Database();
        $idd = $_SESSION['user_id'];

        $stmt = $this->database->connect()->prepare("
            INSERT INTO likes (id_user, id_liked_user, reaction, id_match)
            VALUES ('$idd', '$this->id', '1', '0')
        ");
        $stmt->execute();

    }

    public function cross() {
        $this->database = new Database();
        $idd = $_SESSION['user_id'];

        $stmt = $this->database->connect()->prepare("
            INSERT INTO likes (id_user, id_liked_user, reaction, id_match)
            VALUES ('$idd', '$this->id', '0', '0')
        ");
        $stmt->execute();
    }


}