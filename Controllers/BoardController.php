<?php

require_once('AppController.php');
require_once __DIR__.'/../Models/Candidate.php';
require_once __DIR__.'/../Database.php';
require_once __DIR__.'/../Repository/CandidateRepository.php';


class BoardController extends AppController {

    public function getLatestCandidates()
    {
//        $likeDatabase = new Database();
//        $likeDatabase->connect();

        $candidateRepository = new CandidateRepository();

        $candidate = $candidateRepository->getCandidate();



        //$candidate1 = new Candidate('Alice', 19, "Cracov", 'Apex', 'Female', "img_01.png");


        $data = [$candidate];


        $this->render('board', ['candidate' => $candidate]);
    }

    public function like_user(): void
    {
        if (!isset($_POST['id'])) { http_response_code(404);
        return;
        }
        $user = new CandidateRepository();
        $user->like((int)$_POST['id']);
        http_response_code(200);
    }

    public function cross_user(): void
    {
        if (!isset($_POST['id'])) { http_response_code(404);
            return;
        }
        $user = new CandidateRepository();
        $user->cross((int)$_POST['id']);
        http_response_code(200);
    }
}