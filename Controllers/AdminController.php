<?php

require_once 'AppController.php';
require_once __DIR__ . '/../Models/User.php';
require_once __DIR__ . '/../Repository/UserRepository.php';

class AdminController extends AppController
{

    public function index()
    {
        $userRepository = new UserRepository();
        $this->render('users', ['user' => $userRepository->getUser($_SESSION['id'])]);
    }

    public function users()
    {

        $user = new UserRepository();
        header('Content-type: application/json');
        http_response_code(200);
        echo $user->getCopyOfUsers() ? json_encode($user->getCopyOfUsers()) : '';
    }

    public function deleteUser()
    {
        if (!isset($_POST['id'])) {
            http_response_code(404);
            return;
        }
        $user = new UserRepository();
        $user->delete((int)$_POST['id']);
        http_response_code(200);
    }
}