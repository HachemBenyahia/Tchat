<?php

    namespace App\Model;

    use App\Model\User;

    class Message
    {
        private $id;
        private $content;
        private $datetime;
        private $user;

        public function __contruct($content)
        {
            $this->content = $content;
            $this->datetime = date("Y-m-d H:i:s");
        }

        public function setUser(User $user)
        {
            $this->user = $user;
        }

        public function insert()
        {
            $content = $this->content;
            $datetime = $this->datetime;
            $idUser = $this->user->id;

            try {
                $pdo = new PDO("mysql:host=localhost;dbname=tchat", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "insert into message (content, datetime, id_user) VALUES ($content, $datetime, $idUser)";
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
