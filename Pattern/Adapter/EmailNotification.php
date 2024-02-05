<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/4 18:08
 */

namespace App\Pattern\Adapter;

class EmailNotification implements Notification
{
    private string $mailStr;

    public function __construct(string $mailStr)
    {
        $this->mailStr = $mailStr;
    }


    public function send(string $title, string $msg): void
    {
        mail($this->mailStr, $title, $msg);
    }
}
