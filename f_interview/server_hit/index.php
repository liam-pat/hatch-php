<?php


require './Hash.php';
$hashServer = new \App\f_interview\server_hit\Hash();

$hashServer->addServer('192.168.1.1');
$hashServer->addServer('192.168.1.2');
$hashServer->addServer('192.168.1.3');
$hashServer->addServer('192.168.1.4');

echo 'save key1 in server:', $hashServer->lookup('key1') . PHP_EOL;
echo 'save key2 in server:', $hashServer->lookup('key2') . PHP_EOL;

echo '####################' . PHP_EOL;

$hashServer->removeServer('192.168.1.2');
echo 'save key3 in server:', $hashServer->lookup('key3') . PHP_EOL;
echo 'save key4 in server:', $hashServer->lookup('key4') . PHP_EOL;

echo '####################' . PHP_EOL;

$hashServer->addServer('192.168.1.6');
echo 'save name in server:', $hashServer->lookup('name') . PHP_EOL;
echo 'save girl in server:', $hashServer->lookup('girl') . PHP_EOL;
