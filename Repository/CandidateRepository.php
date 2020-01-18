<?php

require_once "Repository.php";
require_once __DIR__.'/../Models/Candidate.php';

class CandidateRepository extends Repository {

    public function getCandidate(): ?Candidate
    {
        $id = $_SESSION["user_id"];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_data WHERE NOT id_user_data = :id AND NOT :id IN (SELECT id_user FROM likes WHERE id_user = :id AND id_liked_user IN (SELECT id_liked_user FROM likes WHERE user_data.id_user_data = id_liked_user))
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $candidate1 = $stmt->fetch(PDO::FETCH_ASSOC);


        $stmt2 = $this->database->connect()->prepare('
            SELECT * FROM users WHERE NOT id_user = :id AND NOT :id IN (SELECT id_user FROM likes WHERE id_user = :id AND id_liked_user IN (SELECT id_liked_user FROM likes WHERE users.id_user_data = id_liked_user))
        ');
        $stmt2->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt2->execute();

        $candidate2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        if($candidate2 == false || $candidate1 == false) {
            return null;
        }

        return new Candidate(
            $candidate2['id_user_data'],
            $candidate1['name'],
            $candidate1['age'],
            $candidate2['location'],
            $candidate2['game'],
            $candidate1['gender'],
            $candidate2['photo']
        );
    }

    public function getCandidates(): array
    {
        $id = $_SESSION["user_id"];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_data WHERE NOT id_user_data = :id AND NOT :id IN (SELECT id_user FROM likes WHERE id_user = :id AND id_liked_user IN (SELECT id_liked_user FROM likes WHERE user_data.id_user_data = id_liked_user))
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $candidate1 = $stmt->fetch(PDO::FETCH_ASSOC);


        $stmt2 = $this->database->connect()->prepare('
            SELECT * FROM users WHERE NOT id_user = :id AND NOT :id IN (SELECT id_user FROM likes WHERE id_user = :id AND id_liked_user IN (SELECT id_liked_user FROM likes WHERE users.id_user_data = id_liked_user))
        ');
        $stmt2->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt2->execute();

        $candidate2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        if($candidate2 == false || $candidate1 == false) {
            return null;
        }

        $aa = new Candidate(
            $candidate2['id_user_data'],
            $candidate1['name'],
            $candidate1['age'],
            $candidate2['location'],
            $candidate2['game'],
            $candidate1['gender'],
            $candidate2['photo']
        );

        $data = [$aa];

        return $data;
    }

    public function like(int $id) {

        $this->database = new Database();
        $idUser = $_SESSION['user_id'];
        $idCandidate = $id;


        $stmt = $this->database->connect()->prepare("
            INSERT INTO likes (id_user, id_liked_user, reaction, id_match)
            VALUES ('$idUser', '$idCandidate', '1', '0')
        ");
        $stmt->execute();

    }
}