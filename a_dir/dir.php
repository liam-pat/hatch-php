<?php
require_once '../vendor/autoload.php';

//change current dir
echo sprintf('change current dir to /tmp : %s , current dir : %s', chdir('/tmp') ? 'true' : 'false', getcwd()), PHP_EOL;

//echo sprintf('change current dir to /tmp : %s , current dir : %s', chroot('/tmp') ? 'true' : 'false', getcwd()), PHP_EOL;

echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/**
 * 1) method 1
 */
$dir = opendir('/tmp');
while (($file = readdir($dir)) !== false) {
    echo sprintf('read dir : %s', $file), PHP_EOL;
}
rewinddir(); // reset
closedir($dir);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
/**
 * 2) method 2
 */
$dir1 = dir('/tmp');
while (($file = $dir1->read()) !== false) {
    echo sprintf('read dir : %s', $file), PHP_EOL;
}
$dir1->rewind();
$dir1->close();
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

chdir('/var');
dump(scandir('./', SORT_DESC));