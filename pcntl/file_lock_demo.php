<?php
$pid = pcntl_fork();
$fp = fopen('..' . "/tmp/output.log", 'ab');

if ($pid === 0) {
    for ($i = 1; $i < 10; $i++) {
        if (flock($fp, LOCK_EX) === true) {
            echo sprintf('[%s] Child process get lock successfully %s', date('Y-m-d H:i:s'), PHP_EOL);
            fwrite($fp, sprintf('[%s] ', date('Y-m-d H:i:s')));
            fflush($fp);
            fwrite($fp, '十年生死两茫茫，');
            fflush($fp);
            fwrite($fp, '不思量，');
            fflush($fp);
            fwrite($fp, '自难忘。');
            fflush($fp);
            fwrite($fp, '千里孤坟，');
            fflush($fp);
            fwrite($fp, '无处话凄凉。' . PHP_EOL);
            fflush($fp);
            flock($fp, LOCK_UN);
            usleep(500000);
        } else {
            echo sprintf('[%s] Child process cannot get lock %s', date('Y-m-d H:i:s'), PHP_EOL);
        }
    }
} elseif ($pid > 0) {
    for ($i = 1; $i < 10; $i++) {
        if (flock($fp, LOCK_EX) === true) {
            echo sprintf('[%s] Main process get lock successfully %s', date('Y-m-d H:i:s'), PHP_EOL);
            fwrite($fp, sprintf('[%s] ', date('Y-m-d H:i:s')));
            fflush($fp);
            fwrite($fp, '唧唧复唧唧，');
            fflush($fp);
            fwrite($fp, '木兰当户织，');
            fflush($fp);
            fwrite($fp, '不闻机杼声，');
            fflush($fp);
            fwrite($fp, '惟闻女叹息。' . PHP_EOL);
            fflush($fp);
            flock($fp, LOCK_UN);
            usleep(500000);
        } else {
            echo sprintf('[%s] Main process get lock failed , %s', date('Y-m-d H:i:s'), PHP_EOL);
        }
    }
    sleep(20);
} else {
    exit(-1);
}
