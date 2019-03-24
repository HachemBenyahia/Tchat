<?php
    namespace App\Controller;

    class View
    {
        private $server;

        public function __contruct() {
            $this->server = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"];
        }

        public function index()
        {
            $server = $this->server;
            require(dirname(__DIR__) . "/View/index.php");
        }

        public function login()
        {
            $server = $this->server;
            require(dirname(__DIR__) . "/View/login.php");
        }
    }
