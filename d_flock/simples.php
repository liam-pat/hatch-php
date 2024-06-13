<?php

/**
 * optimistic lock
 * @return void
 */
function write(): void
{
    $fp = fopen("../tmp/flock_fun.txt", 'a');
    do {
        usleep(100);
    } while (!flock($fp, LOCK_EX));

    fwrite($fp, "test" . PHP_EOL);
    flock($fp, LOCK_UN);
    fclose($fp);
}

/**
 * total 7 processes
 * @return void
 */
function pcntlFork(): void
{
    for ($i = 0; $i < 3; $i++) {
        $pid = pcntl_fork();
    }
    sleep(30);
}

/**
 * 2 locks,
 * @return void
 */
function block(): void
{
    $fd1 = fopen('lock.txt', 'w+');
    $fd2 = fopen('lock.txt', 'w+');

    flock($fd1, LOCK_EX);
    flock($fd2, LOCK_EX);    // block
}
