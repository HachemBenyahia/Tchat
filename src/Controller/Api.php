<?php
    namespace App\Controller;

    class Api
    {
        public function getMessages() {
            try {
                $pdo = new PDO("mysql:host=localhost;dbname=tchat", "root", "");
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $sql = "select * from messages";
                $pdo->prepare($sql)->execute();
                $this->id = PDO::lastInsertId;

                $pdo = null;
            }
            catch(Exception $error) {
                return $error;
            }

            // return messages
        }
    }
