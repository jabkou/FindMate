<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/Candidate.php';

class CandidateRepository extends Repository {

    public function getCandidate(int $id): ?Candidate
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_data WHERE id_user_data = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $candidate1 = $stmt->fetch(PDO::FETCH_ASSOC);


        $stmt2 = $this->database->connect()->prepare('
            SELECT * FROM users WHERE id_user = :id
        ');
        $stmt2->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt2->execute();

        $candidate2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        if($candidate2 == false || $candidate1 == false) {
            return null;
        }

        return new Candidate(
            $candidate1['name'],
            $candidate1['age'],
            $candidate2['location'],
            $candidate2['game'],
            $candidate1['gender'],
            $candidate2['photo']
        );
    }

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($users as $user) {
            $result[] = new User(
                $user['email'],
                $user['password'],
                $user['name'],
                $user['surname'],
                $user['id']
            );
        }

        return $result;
    }
}