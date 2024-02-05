<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/4 18:15
 */

namespace App\Pattern\Adapter;

require '../../vendor/autoload.php';

$emailNotification = new EmailNotification('dev@test.com');

$slackAdapter = new SlackAdapter('test.com', 'xxxxxxxxxxxxxxxxxxxx');
$slackNotification = new SlackNotification($slackAdapter, 'example.com');

$emailNotification->send('test', 'test-test');
$slackNotification->send('test', 'test-test');

