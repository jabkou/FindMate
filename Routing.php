<?php

require_once 'Controllers/BoardController.php';
require_once 'Controllers/SecurityController.php';
require_once 'Controllers/AdminController.php';

class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'board' => [
                'controller' => 'BoardController',
                'action' => 'getLatestCandidates'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'user_like_user' => [
                'controller' => 'BoardController',
                'action' => 'like_user'
            ],
            'user_cross_user' => [
                'controller' => 'BoardController',
                'action' => 'cross_user'
            ],
            'register' => [
                'controller' => 'SecurityController',
                'action' => 'register'
            ],
            'you' => [
                'controller' => 'BoardController',
                'action' => 'you'
            ],
            'updateGame' => [
                'controller' => 'BoardController',
                'action' => 'updateGame'
            ],
            'updatePhoto' => [
                'controller' => 'BoardController',
                'action' => 'updatePhoto'
            ],
            'updateDescription' => [
                'controller' => 'BoardController',
                'action' => 'updateDescription'
            ],
            'updateLocation' => [
                'controller' => 'BoardController',
                'action' => 'updateLocation'
            ],
            'admin' => [
                'controller' => 'AdminController',
                'action' => 'index'
            ],
            'users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ],
            'admin_delete_user' => [
                'controller' => 'AdminController',
                'action' => 'deleteUser'
            ]

        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}