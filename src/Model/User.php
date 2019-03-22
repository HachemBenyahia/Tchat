<?php

    namespace App\Model;

    use App\Model\Message;

    class User
    {
        private $id;
        private $username;
        private $password;

        public function __contruct($username, $password)
        {
            $this->username = $username;
            $this->password = hash("sha256", $password);
        }

        public function getMessages()
        {
            $id = $this->id;

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=tchat", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "select * from message where id_user = $id";
                $pdo->prepare($sql)->execute();
                $this->id = PDO::lastInsertId;

                $pdo = null;
            }
            catch(Exception $error) {
                return $error;
            }

            return $messages;
        }

        public function insert()
        {
            $username = $this->username;
            $password = $this->password;

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=tchat", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "insert into user (username, password) values ($username, $password)";
                $pdo->prepare($sql)->execute();
                $this->id = PDO::lastInsertId;

                $pdo = null;

            }
            catch(Exception $error) {
                return $error;
            }

            return null;
        }
    }
