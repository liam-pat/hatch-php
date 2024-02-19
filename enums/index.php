<?php

require_once '../vendor/autoload.php';

$response = new \App\enums\Response("content", \App\enums\HttpStatusCode::Ok, []);
echo \App\enums\HttpStatusCode::Ok->message().PHP_EOL;
echo $response->getStatusCodeValue() . PHP_EOL;
