<?php

/****
 * fwrite  php program  -> user cache
 * fflush   user cache   -> system cache
 * fsync   system cache -> device
 */
$pid = pcntl_fork();  //NOTE.... fork before fopen, so they are diff fopen, second lock will be awaited
$f1 = fopen("../tmp/no_flock.txt", "a");
if ($pid == 0) {
    for ($i = 0; $i < 5; $i++) {
        fwrite($f1, "黄河远上白云间，");
        fflush($f1);

        fwrite($f1, "一片孤城万仞山。");
        fflush($f1);

        fwrite($f1, "羌笛何须怨杨柳，");
        fflush($f1);

        fwrite($f1, "春风不度玉门关。\n");
        fflush($f1);
    }
} elseif ($pid > 0) {
    for ($i = 0; $i < 5; $i++) {
        fwrite($f1, "葡萄美酒夜光杯，");
        fflush($f1);

        fwrite($f1, "欲饮琵琶马上催。");
        fflush($f1);

        fwrite($f1, "醉卧沙场君莫笑，");
        fflush($f1);

        fwrite($f1, "古来征战几人回。\n");
        fflush($f1);
    }
}
//////////////////////////////////////////////////////////////////////
////////////////////////////////
/// ///////////////////////////
/// ////////////////////
///

$pid = pcntl_fork();
$f = fopen('../tmp/flock.txt', 'a');

if ($pid == 0) {
    for ($i = 0; $i < 5; $i++) {
        if (flock($f, LOCK_EX)) {
            fwrite($f, "黄河远上白云间，");
            fflush($f);

            fwrite($f, "一片孤城万仞山。");
            fflush($f);

            fwrite($f, "羌笛何须怨杨柳，");
            fflush($f);

            fwrite($f, "春风不度玉门关。\n");
            fflush($f);

            flock($f, LOCK_UN);
        }
    }
} elseif ($pid > 0) {
    for ($i = 0; $i < 5; $i++) {
        if (flock($f, LOCK_EX)) {
            fwrite($f, "葡萄美酒夜光杯，");
            fflush($f);

            fwrite($f, "欲饮琵琶马上催。");
            fflush($f);

            fwrite($f, "醉卧沙场君莫笑，");
            fflush($f);

            fwrite($f, "古来征战几人回。\n");
            fflush($f);

            flock($f, LOCK_UN);
        }
    }
}
