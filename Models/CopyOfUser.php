<?php
require_once __DIR__.'/../Models/User.php';


class CopyOfUser
{
    public $id;
    public $email;
    public $name;
    public $age;
    public $gender;
    public $role;

    public function __construct(
        string $email,
        string $name,
        string $gender,
        int $age,
        int $id,
        int $role
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->gender = $gender;
        $this->age = $age;
        $this->role = $role;
    }
}
