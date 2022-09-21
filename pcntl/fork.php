<?php
for ($i = 0; $i < 3; $i++) {
    $pid = pcntl_fork();
}
sleep(30);