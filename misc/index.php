<?php
echo 'connection_aborted: ', connection_aborted() ? 'true' : 'false', PHP_EOL, '</br>';
/**
 * CONNECTION_NORMAL = 0
 * CONNECTION_ABORTED = 1
 * CONNECTION_TIMEOUT = 2
 */
echo 'connection_status: ', connection_status() . PHP_EOL . '</br>';

echo constant('CONNECTION_NORMAL'), '</br>';
echo constant('CONNECTION_ABORTED'), '</br>';

/**
 * const vs define
 * const : always use in class
 * define : define a global var
 */
define('IS_ADMIN', true);
echo IS_ADMIN ? 'yes' : 'no', '</br>';

define('USER_LEVELS', ['FREE_USER' => 1, 'PREMIUM' => 1]);
print_r(USER_LEVELS);

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo defined('IS_ADMIN') ? 'yes' : 'no', '</br>';
echo defined('IS_ADMIN_TEST') ? 'yes' : 'no', '</br>';

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$code = <<<EOF
echo 'test eval fun',PHP_EOL;
EOF;
eval($code);

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$browserInfo = get_browser();
print_r($browserInfo);
echo '</br>';

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$highlightPHP = highlight_file('./demo_function.php');
$rmWhiteSpace = highlight_string(php_strip_whitespace('./demo_function.php'));
echo $highlightPHP;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo $rmWhiteSpace;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$phpCode = highlight_string('<?php phpinfo(); ?>');
$html1 = <<<EOF
<html lang="en">
echo $phpCode
</html>
EOF;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo 'nano seconds :', hrtime(true) . '</br>';
print_r(hrtime());
echo '</br>';

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
ignore_user_abort();

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$bcrypt = pack('H*', '12212');
echo 'bcrypt: ', $bcrypt, '</br>';
$deBcrypt = unpack('H*', $bcrypt);
print_r($deBcrypt);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;


echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo '</br>', 'start to sleep' . '</br>';
sleep(1);
usleep(1000);
time_nanosleep(1, 1212112);
time_sleep_until((new DateTimeImmutable())->getTimestamp() + 1);

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo '</br>', 'start to gen unique id' . '</br>';
echo uniqid('mach-01-', true) . '</br>';
echo uniqid('mach-02-', true) . '</br>';




