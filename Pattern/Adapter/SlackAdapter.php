<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/4 18:10
 */

namespace App\Pattern\Adapter;

class SlackAdapter
{
    private string $username;
    private string $apiKey;

    public function __construct(string $login, string $apiKey)
    {
        $this->username = $login;
        $this->apiKey = $apiKey;
    }

    public function logIn(): string
    {
        // call the api to login in
        echo $this->username . $this->apiKey . PHP_EOL;;

        return true;

    }

    public function sendMessage(string $chatId, string $message): string
    {
        // call the slack api to send msg
        echo $chatId . $message . PHP_EOL;

        return true;
    }
}
