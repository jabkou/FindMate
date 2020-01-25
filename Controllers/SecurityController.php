<?php

require_once 'AppController.php';
require_once __DIR__.'/../Models/User.php';
require_once __DIR__.'/../Repository/UserRepository.php';


class SecurityController extends AppController {

    public function login()
    {
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $userRepository->getUser($email);

            if (!$user) {
                $this->render('login', ['messages' => ['User with this email not exist!']]);
                return;
            }


            if (!password_verify( $password, $user->getPassword() )) {
                $this->render('login', ['messages' => ['Wrong password!']]);
                return;
            }

            $_SESSION["id"] = $user->getEmail();
            $_SESSION["role"] = $user->getRole();
            $_SESSION["user_id"] = $user->getId();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
        }

        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }

    public function register(){

        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $email = $_POST['email'];
            $password1 = $_POST['password1'];
            $password2 = $_POST['password2'];
            $name = $_POST['user_name'];
            $birth_year = $_POST['birth_year'];
            $gender = $_POST['gender'];

            if($password1 != $password2){
                $this->render('register', ['messages' => ['Passwords must be the same!']]);
                return;
            }
            $password_hash = password_hash($password1, PASSWORD_BCRYPT);


            $user = $userRepository->addUser($email, $password_hash, $name, $birth_year, $gender);

            if (!$user) {
                $this->render('register', ['messages' => ['User with this email exist!']]);
            }

            $_SESSION["id"] = $user->getEmail();
            $_SESSION["role"] = $user->getRole();
            $_SESSION["user_id"] = $user->getId();

            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=board");
        }

        $this->render('register');


    }
}