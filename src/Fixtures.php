<?php

    use App\Model\Message;
    use App\Model\User;

    $user1 = new User("tomate", "tomate");
    $user2 = new User("patate", "patate");

    $user1->insert();
    $user2->insert();

    for ($i = 0 ; $i < 10 ; $i ++) {
        $message = new Message(str_shuffle("abcdefghijklmnopqurstuvwxyz,.     "));

        if ($i % 2) {
            $message->setUser($user1);
        }
        else {
            $message->setUser($user2);
        }

        $message->insert();
    }
