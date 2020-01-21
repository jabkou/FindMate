<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/User.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_data WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['user_name'],
            $user['gender'],
            $user['age'],
            $user['id_user_data']
        );
    }

    public function addUser(string $email, string $password, string $name, int $birth_year, string $gender) {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_data WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == true) {
            return null;
        }
        $stmt = $this->database->connect()->prepare("
            INSERT INTO user_data (user_name, age, gender, email, password) VALUES ('$name', '$birth_year', '$gender', '$email', '$password')
        ");
        $stmt->execute();


        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_data WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        return new User(
            $user['email'],
            $user['password'],
            $user['user_name'],
            $user['gender'],
            $user['age'],
            $user['id_user_data']
        );
    }

}