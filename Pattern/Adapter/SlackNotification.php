<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/4 18:12
 */

namespace App\Pattern\Adapter;

class SlackNotification implements Notification
{
    private SlackAdapter $slackAdapter;
    private string $chatId;

    public function __construct(SlackAdapter $slack, string $chatId)
    {
        $this->slackAdapter = $slack;
        $this->chatId = $chatId;
    }

    public function send(string $title, string $msg): void
    {
        $this->slackAdapter->logIn();
        $this->slackAdapter->sendMessage($this->chatId, $msg);
    }
}
