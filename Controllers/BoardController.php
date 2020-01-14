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

        $candidate = $candidateRepository->getCandidate(2);



        //$candidate1 = new Candidate('Alice', 19, "Cracov", 'Apex', 'Female', "img_01.png");


        $data = [$candidate];


        $this->render('board', ['candidates' => $data]);
    }
}