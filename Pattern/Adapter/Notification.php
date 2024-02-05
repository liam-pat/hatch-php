<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/4 18:07
 */

namespace App\Pattern\Adapter;

interface Notification
{
    public function send(string $title, string $msg);
}
