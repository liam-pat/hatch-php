<?php
require_once '../vendor/autoload.php';

$str = 'it is the easy password';
dump($str, PHP_EOL);
dump(sprintf('sha1() `%s`', sha1($str)));
dump(sprintf('md5() `%s`', md5($str)));
dump(sprintf('hash(crc32b) `%s`', hash('crc32b', $str)));
dump(sprintf('crc32() `%u`', crc32($str)));
dump(sprintf('md5_file() `%s`', md5_file('./index.php')));
dump(sprintf('sha1_file() `%s`', sha1_file('./index.php')));
dump(sprintf('crypt() `%s`', crypt($str, time())));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

//  rot13 , char +13  , decode use the same function
$str = str_rot13('PHP 4.3.0');
echo $str, PHP_EOL; // CUC 4.3.0
echo str_rot13($str), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
