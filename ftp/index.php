<?php
/**
 * Created by PhpStorm.
 * Date: 2022/9/30 12:04
 */
include './FTP.php';

$localTmpDir = '../tmp/';
$localFTPFile = $localTmpDir . 'ftp.txt';
touch($localFTPFile);

$ftp = new \App\ftp\FTP('192.168.220.15', 'ftp', 'ftp');
/**
 * pwd function
 */
echo sprintf('pwd : %s', $ftp->pwd()), PHP_EOL;
/**
 * alloc function
 */
[$isSuccess, $result] = $ftp->alloc(4 * 1024);
echo sprintf('alloc : %s , size : %d', $isSuccess ? 'true' : 'false', $result), PHP_EOL;
/**
 * append function
 */
$list = $ftp->ls('/');
$appendContent = <<<EOF
01
02
03
04

EOF;
file_put_contents(sprintf('%s%s', $localTmpDir, 'append.txt'), $appendContent);
$isSuccess = $ftp->appendToFile(sprintf('%s%s', $localTmpDir, 'append.txt'), 'ftp.txt');
$ftp->chmod('append.txt', 0755);
unlink(sprintf('%s%s', $localTmpDir, 'append.txt'));
/**
 * exec ftp cmd
 */
$execFTPCMDResult = $ftp->execFTPCMD('STAT /');
var_dump($execFTPCMDResult);
$isChange = $ftp->changeDir('tmp');
