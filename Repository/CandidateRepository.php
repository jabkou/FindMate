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
            SELECT * FROM users WHERE NOT id_user_data = :id AND NOT role = 1 AND NOT :id IN (SELECT id_user FROM likes WHERE id_user = :id AND id_liked_user IN (SELECT id_liked_user FROM likes WHERE users.id_user_data = id_liked_user))
        ');
        $stmt2->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt2->execute();

        $candidate2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        if($candidate2 == false || $candidate1 == false) {

            $stmt = $this->database->connect()->prepare("
            SELECT photo FROM users WHERE id_user_data=15
        ");
            $stmt->execute();
            $pom = $stmt->fetch(PDO::FETCH_ASSOC);


            return new Candidate(0, 'there is no-one else', 0, 'not here', 'none', 'none', $pom['photo'], 'none');
        }

        return new Candidate(
            $candidate2['id_user_data'],
            $candidate1['user_name'],
            $candidate1['age'],
            $candidate2['location'],
            $candidate2['game'],
            $candidate1['gender'],
            $candidate2["photo"],
            $candidate2['description']
        );
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

        $pom = $stmt->fetch(PDO::FETCH_ASSOC) ?: 0;
        $result=false;
        if($pom > 0)
            $result = true;

        return $result;
    }

    public function getCandidateMe(): ?Candidate
    {
        $id = $_SESSION["user_id"];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM user_data WHERE id_user_data = :id
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $candidate1 = $stmt->fetch(PDO::FETCH_ASSOC);


        $stmt2 = $this->database->connect()->prepare('
            SELECT * FROM users WHERE id_user_data = :id 
        ');
        $stmt2->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt2->execute();

        $candidate2 = $stmt2->fetch(PDO::FETCH_ASSOC);

        return new Candidate(
            $candidate2['id_user_data'],
            $candidate1['user_name'],
            $candidate1['age'],
            $candidate2['location'],
            $candidate2['game'],
            $candidate1['gender'],
            $candidate2['photo'],
            $candidate2['description']
        );
    }

    public function updateGame(string $game){
        $this->database = new Database();
        $idUser = $_SESSION['user_id'];

        $stmt = $this->database->connect()->prepare("
            UPDATE users SET game = '$game' WHERE id_user_data = :id
        ");
        $stmt->bindParam(':id', $idUser, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function updatePhoto($imagetmp){
        $this->database = new Database();
        $idUser = $_SESSION['user_id'];


        $stmt = $this->database->connect()->prepare("
            UPDATE users SET photo ='$imagetmp' WHERE id_user_data = :id
        ");
        $stmt->bindParam(':id', $idUser, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function updateLocation(string $location){
        $this->database = new Database();
        $idUser = $_SESSION['user_id'];

        $stmt = $this->database->connect()->prepare("
            UPDATE users SET location = '$location' WHERE id_user_data = :id
        ");
        $stmt->bindParam(':id', $idUser, PDO::PARAM_STR);

        $stmt->execute();
    }

    public function updateDescription(string $description){
        $this->database = new Database();
        $idUser = $_SESSION['user_id'];

        $stmt = $this->database->connect()->prepare("
            UPDATE users SET description = '$description' WHERE id_user_data = :id
        ");
        $stmt->bindParam(':id', $idUser, PDO::PARAM_STR);

        $stmt->execute();
    }
}