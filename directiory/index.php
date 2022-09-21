<?php
//change current dir
echo sprintf('change current dir to /tmp : %s , current dir : %s', chdir('/tmp') ? 'true' : 'false', getcwd()), PHP_EOL;

// change the process current dir
//echo sprintf('change current dir to /tmp : %s , current dir : %s', chroot('/tmp') ? 'true' : 'false', getcwd()), PHP_EOL;

echo '##################', PHP_EOL;
// process to open
$dir = opendir('/tmp');
while (($file = readdir($dir)) !== false) {
    echo sprintf('read dir : %s', $file), PHP_EOL;
}
rewinddir(); // reset
closedir($dir);
echo '##################', PHP_EOL;
// object to open
$dir1 = dir('/tmp');
while (($file = $dir1->read()) !== false) {
    echo sprintf('read dir : %s', $file), PHP_EOL;
}
echo '##################', PHP_EOL;
chdir('/var');
print_r(scandir('./', SORT_DESC));

