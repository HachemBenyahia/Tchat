<?php
    namespace App\Controller;

    class View
    {
        public function index()
        {
            require(dirname(__DIR__) . "/View/index.php");
        }

        public function login()
        {
            require(dirname(__DIR__) . "/View/login.php");
        }
    }
