<?php

require_once('AppController.php');
require_once __DIR__.'/../Models/Candidate.php';
require_once __DIR__.'/../Database.php';


class BoardController extends AppController {

    public function getLatestCandidates()
    {
        $database = new Database();     //??
        $database->connect();

        $candidate1 = new Candidate('img_01.png', 19, 21, 'Alicja', 'Cod: MW');
        $candidate2 = new Candidate('img_01.png', 21, 18, 'Maja', 'Apex');


        $data = [$candidate1];


        $this->render('board', ['candidates' => $data]);
    }
}