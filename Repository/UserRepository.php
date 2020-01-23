<?php

require_once "Repository.php";
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Models/CopyOfUser.php';


class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_view WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['user_name'],
            $user['gender'],
            $user['age'],
            $user['id_user_data'],
            $user['role']
        );
    }

    public function addUser(string $email, string $password, string $name, int $birth_year, string $gender)
    {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_data WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            return null;
        }
        $stmt = $this->database->connect()->prepare("
        CALL AddUser ('$email', '$password', '$name', '$birth_year', '$gender')
        ");
        $stmt->execute();


        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_view WHERE email = :email
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
            $user['id_user_data'],
            $user['role']
        );
    }


    public function getUsers(): array
    {
        $result = [];


        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_view WHERE email != :email
        ');
        $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['password'],
                $user['user_name'],
                $user['gender'],
                $user['age'],
                $user['id_user_data'],
                $user['role']
            );
        }


        return $result;
    }

    public function getCopyOfUsers(): array
    {
        $result = [];


        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_view WHERE email != :email
        ');
        $stmt->bindParam(':email', $_SESSION['id'], PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new CopyOfUser(
                $user['email'],
                $user['user_name'],
                $user['gender'],
                $user['age'],
                $user['id_user_data'],
                $user['role']
            );
        }


        return $result;
    }


    public function delete(int $id): void
    {
        try {
            $stmt = $this->database->connect()->prepare('
            DELETE FROM users WHERE id_user_data = :id;');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $stmt2 = $this->database->connect()->prepare('
            DELETE FROM user_data WHERE id_user_data = :id;');
            $stmt2->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt2->execute();
        } catch (PDOException $e) {
            die();
        }
    }

}