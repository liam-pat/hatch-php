<?php
$pid = pcntl_fork();
$fp = fopen('..' . "/tmp/file_lock_random.log", 'ab');

if ($pid === 0) {
    for ($i = 1; $i <= 10; $i++) {
        if (flock($fp, LOCK_EX) === true) {
            echo sprintf('[%s]########## Child process get lock successfully %s', date('Y-m-d H:i:s'), PHP_EOL);

            fwrite($fp, file_lock_random . phpsprintf('[%s] 十年生死两茫茫，不思量，自难忘。千里孤坟，无处话凄凉。', date('Y-m-d H:i:s')) . PHP_EOL);
            fflush($fp);
            fsync($fp);

            flock($fp, LOCK_UN);
            usleep(500000);

            echo sprintf('[%s]########## Child process lose the lock %s', date('Y-m-d H:i:s'), PHP_EOL);
        }
    }
} elseif ($pid > 0) {
    for ($i = 1; $i <= 10; $i++) {
        if (flock($fp, LOCK_EX) === true) {
            echo sprintf('[%s]---------- Main process get lock successfully %s', date('Y-m-d H:i:s'), PHP_EOL);

            fwrite($fp, sprintf('[%s] 唧唧复唧唧，木兰当户织，不闻机杼声，惟闻女叹息。' . PHP_EOL, date('Y-m-d H:i:s')));
            fflush($fp);
            fsync($fp);

            flock($fp, LOCK_UN);
            usleep(500000);

            echo sprintf('[%s]---------- Main process lose the lock %s', date('Y-m-d H:i:s'), PHP_EOL);
        }
    }


    sleep(5);
} else {
    exit(-1);
}
