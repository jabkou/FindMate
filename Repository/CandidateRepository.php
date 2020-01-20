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
            return new Candidate(0, 'there is noone else,', 0, 'not here', 'none', 'none', 'img_00.jpg');
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

    public function cross(int $id) {

        $this->database = new Database();
        $idUser = $_SESSION['user_id'];
        $idCandidate = $id;


        $stmt = $this->database->connect()->prepare("
            INSERT INTO likes (id_user, id_liked_user, reaction, id_match)
            VALUES ('$idUser', '$idCandidate', '0', '0')
        ");
        $stmt->execute();

    }

    public function check_like(int $id) {
        $this->database = new Database();
        $idUser = $_SESSION['user_id'];
        $idCandidate = $id;


        $stmt = $this->database->connect()->prepare("
            SELECT id_like FROM likes WHERE id_user=:idUser AND id_liked_user=:idCandidate AND id_match='1'
        ");
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_STR);
        $stmt->bindParam(':idCandidate', $idCandidate, PDO::PARAM_STR);
        $stmt->execute();

        $pom=0;
        $pom = $stmt->fetch(PDO::FETCH_ASSOC);
        $result=false;
        if($pom > 0)
            $result = true;

        return $result;
    }
}