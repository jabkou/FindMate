<?php

require_once('AppController.php');
require_once __DIR__.'/../Models/Candidate.php';

class BoardController extends AppController {

    public function getLatestCandidates()
    {
        $candidate1 = new Candidate('img_01.png', 19, 21, 'Alicja', 'Cod: MW');
        $candidate2 = new Candidate('img_01.png', 21, 18, 'Maja', 'Apex');


        $data = [$candidate1];


        $this->render('board', ['candidates' => $data]);
    }
}