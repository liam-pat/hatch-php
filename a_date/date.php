<?php
require_once '../vendor/autoload.php';

echo sprintf('2022-02-21 exists : %s', checkdate(2, 21, 2022) ? 'yes' : 'no') . PHP_EOL;
echo sprintf('2022-02-30 exists : %s', checkdate(2, 30, 2022) ? 'yes' : 'no') . PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// You can get from https://www.php.net/manual/zh/timezones.php
date_default_timezone_set('Asia/Shanghai');
echo sprintf('set up timezone to %s', date_default_timezone_get()) . PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

dump(date_sun_info(strtotime("2022-10-10"), 22.26, 112.57));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo sprintf('datetime : %s', date(DATE_W3C)) . PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo sprintf('make a time : %d', mktime(10)) . PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo sprintf('gm/utc datetime : %s', gmdate(DATE_W3C)) . PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo sprintf('make a gm/utc time : %d', gmmktime(10)) . PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

dump(getdate());
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

dump(gettimeofday());
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo idate('Y') . PHP_EOL; // diff from date , only support 1 char format
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

dump(localtime(null, true));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

dump(microtime(true), microtime(false)) . PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo time() . PHP_EOL;