<?php
$fp = fopen('..' . "/tmp/file_lock_to_write.log", 'ab');
$pid = pcntl_fork();

if ($pid === 0) {
    // pid === 0 , in child process
    if (flock($fp, LOCK_EX)) {
        echo 'child process lock successfully', PHP_EOL;
        for ($i = 1; $i <= 10; $i++) {
            fwrite($fp, sprintf('[%s] ########Times : %d Child process %s', date('Y-m-d H:i:s'), $i, PHP_EOL));
            fflush($fp);
        }
        sleep(10);
        flock($fp, LOCK_UN);
    }
} elseif ($pid > 0) {
    // pid > 0 , in main process
    if (flock($fp, LOCK_EX)) {
        echo 'main process lock successfully', PHP_EOL;
        for ($i = 1; $i <= 10; $i++) {
            fwrite($fp, sprintf('[%s] --------Times : %d Main process is writing%s', date('Y-m-d H:i:s'), $i, PHP_EOL));
            fflush($fp);
        }
        flock($fp, LOCK_UN);
        sleep(10);
    }
} else {
    exit(-1);
}
