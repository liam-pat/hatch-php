<?php
$pid = pcntl_fork();
$fp = fopen('..' . "/tmp/lock.log", 'ab');

if ($pid === 0) {
//    sleep(1);
    if (flock($fp, LOCK_EX) === true) {
        echo sprintf('[%s] Child process get lock successfully %s', date('Y-m-d H:i:s'), PHP_EOL);
        flock($fp, LOCK_UN);
    } else {
        echo sprintf('[%s] Child process cannot get lock %s', date('Y-m-d H:i:s'), PHP_EOL);
    }
} elseif ($pid > 0) {
//        sleep(1);
    if (flock($fp, LOCK_EX) === true) {
        echo sprintf('[%s] Main process get lock successfully %s', date('Y-m-d H:i:s'), PHP_EOL);
        sleep(5);
        flock($fp, LOCK_UN);
    } else {
        echo sprintf('[%s] Main process get lock failed , %s', date('Y-m-d H:i:s'), PHP_EOL);
    }
    sleep(10);
} else {
    exit(-1);
}
