<?php

class User
{
    private $id;
    public $email;
    private $password;
    private $name;
    private $age;
    private $gender;
    private $role;

    public function __construct(
        string $email,
        string $password,
        string $name,
        string $gender,
        int $age,
        int $id,
        int $role
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        $this->role=$role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword() : string
    {
        return $this->password;
    }

    public function getRole(): int
    {
        return $this->role;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getId(): int
    {
        return $this->id;
    }
}