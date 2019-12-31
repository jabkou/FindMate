<?php

class Candidate {
    private $image;
    private $range;
    private $age;
    private $name;
    private $game;

    public function __construct(string $image, int $range, int $age, string $name, string $game)
    {
        $this->image = $image;
        $this->range = $range;
        $this->age = $age;
        $this->name = $name;
        $this->game = $game;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    public function getRange(): int
    {
        return $this->range;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getGame(): string
    {
        return $this->game;
    }

}