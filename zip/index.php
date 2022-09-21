<?php
echo 'All zip function deprecated on PHP8,ZipArchive should be used instead.', PHP_EOL;


$zipPath = './zip_test.zip';
$zip = new ZipArchive();
$zip->open($zipPath, ZipArchive::CREATE);

echo sprintf('zip has %d files', $zip->count()) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

$zip->addFromString('php_code_crate', 'test01');
$zip->addFile('./index.php');
$zip->open($zipPath, ZipArchive::CREATE);

echo sprintf('zip has %d files', $zip->count()) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;



