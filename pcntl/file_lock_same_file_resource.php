<?php
$fp = fopen('..' . "/tmp/demo.log", 'ab');
$pid = pcntl_fork();

if ($pid === 0) {
    // pid === 0 , in child process
    if (flock($fp, LOCK_EX)) {
        echo 'child process lock successfully', PHP_EOL;
        for ($i = 0; $i < 10; $i++) {
            fwrite($fp, sprintf('[%s] Times : %d Child process %s', date('Y-m-d H:i:s'), $i, PHP_EOL));
            fflush($fp);
        }
        sleep(10);
        flock($fp, LOCK_UN);
    }
} elseif ($pid > 0) {
    // pid > 0 , in main process
    if (flock($fp, LOCK_EX)) {
        echo 'main process lock successfully', PHP_EOL;
        for ($i = 0; $i < 10; $i++) {
            fwrite($fp, sprintf('[%s] Times : %d Main process %s', date('Y-m-d H:i:s'), $i, PHP_EOL));
            fflush($fp);
        }
        sleep(10);
    }
} else {
    // pid < 0 , create child process failed
    exit(-1);
}
