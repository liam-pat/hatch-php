<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/5 10:34
 */

require '../../vendor/autoload.php';

$log1 = \App\Pattern\Singleton\Logger::getInstance();
$log2 = \App\Pattern\Singleton\Logger::getInstance();
\App\Pattern\Singleton\Logger::log(sprintf('log1 === log2 : %d', $log1 === $log2 ? 1 : 0));

$config1 = \App\Pattern\Singleton\Config::getInstance();
$config2 = \App\Pattern\Singleton\Config::getInstance();

$config1->setValue('username', 'sam');
$config1->setValue('password', '*******');

\App\Pattern\Singleton\Logger::log(sprintf('login `username` %s --- `password` : %s', $config2->getValue('username'), $config2->getValue('password')));