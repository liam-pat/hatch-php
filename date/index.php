<?php
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('2022-02-21 exists : %s', checkdate(2, 21, 2022) ? 'yes' : 'no') . PHP_EOL;
echo sprintf('2022-02-30 exists : %s', checkdate(2, 30, 2022) ? 'yes' : 'no') . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('current timezone : %s', date_default_timezone_get()) . PHP_EOL;
// You can get from https://www.php.net/manual/zh/timezones.php
date_default_timezone_set('Asia/Shanghai');
echo sprintf('set up timezone to %s', date_default_timezone_get()) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$sunInfo = date_sun_info(strtotime("2022-10-10"), 22.26, 112.57);
print_r($sunInfo);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('datetime : %s', date(DATE_W3C)) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$makeTime = mktime(10);
echo sprintf('make a time : %d', $makeTime) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('gm/utc datetime : %s', gmdate(DATE_W3C)) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$makeGMTime = gmmktime(10);
echo sprintf('make a gm/utc time : %d', $makeGMTime) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$dataInfo = getdate();
print_r($dataInfo);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$timeInfo = gettimeofday();
print_r($timeInfo);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
// detail : https://www.php.net/manual/zh/function.idate.php
echo idate('Y') . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(localtime(null, true));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo microtime(true) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(microtime(false) . PHP_EOL);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo time() . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;




