<?php

class Candidate {
    private $id;
    private $name;
    private $age;
    private $location;
    private $game;
    private $gender;
    private $image;

    public function __construct(string $name, int $age, string $location, string $game,string $gender, string $image)
    {
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


}