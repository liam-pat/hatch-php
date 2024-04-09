<?php
$newFilePath = '../tmp/test.jpg';
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo basename($newFilePath), PHP_EOL;
// output: test.jpg
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fOpen = fopen($newFilePath, 'wb');
fclose($fOpen);
echo sprintf('%s group is %s', $newFilePath, filegroup($newFilePath)), PHP_EOL;
// because do not know your system group id
chgrp($newFilePath, filegroup($newFilePath));
clearstatcache();
echo sprintf('%s group is %s', $newFilePath, filegroup($newFilePath)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * change file group
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('Change file group : %s', chmod($newFilePath, 0755) ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * change file owner
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('Change file owner : %s', chown($newFilePath, fileowner($newFilePath)) ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * clear file cache
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo 'Clear the file cache status', PHP_EOL;
clearstatcache();
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * copy file
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('Clone to a new file : %s', copy($newFilePath, '../tmp/file_fun_test_copy.txt') ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * get dir name
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('%s dirname is : %s', $newFilePath, dirname($newFilePath)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * df info
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('df total : %s, df free : %s', disk_total_space('/'), disk_free_space('/')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fwrite() function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$newFilePath01 = '../tmp/fsync_fdatasync_test.txt';
$stream = fopen($newFilePath01, 'wb');
fwrite($stream, sprintf('[%s] No paid no gain', 'Fun fsync') . PHP_EOL);
fwrite($stream, sprintf('[%s] Practise makes perfect', 'Fun fsync') . PHP_EOL);
// fsync will update the file properly
echo sprintf('fsync save stream to file directly : %s', fsync($stream) ? 'true' : 'false'), PHP_EOL;
fwrite($stream, sprintf('[%s] The first step is always the hardest', 'Fun fdatasync') . PHP_EOL);
fwrite($stream, sprintf('[%s] You reap what you sow', 'Fun fdatasync') . PHP_EOL);
// fdatasync only update the file data
echo sprintf('fdatasync save stream to file directly : %s', fdatasync($stream) ? 'true' : 'false'), PHP_EOL;
fclose($stream);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fgetc function,l read a char
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fp = fopen($newFilePath01, 'rb');
$fGetCTimes = 0;
$fGetSTimes = 0;
while (!feof($fp)) {
    echo fgetc($fp);
    $fGetCTimes++;
}
echo sprintf('fGetC time : %d', $fGetCTimes), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fgets() function , read a line . default 1024 byte a line
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
rewind($fp);
while (!feof($fp)) {
    echo fgets($fp);
    $fGetSTimes++;
}
fclose($fp);
echo sprintf('fGetS time : %d', $fGetSTimes), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * file csv get content function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$csvFilePath = '../tmp/csv_data.csv';
$csvFP = fopen($csvFilePath, 'wb');
$csvStr = <<<EOF
8800009495||1006|01|20200702:185811|Activate|20210702:000000|20210119:050000|20210119:050000
8800009777||1009|02|20200507:000000|Activate|20210507:000000|20210119:050000|20210119:050000
8800009912||1009|03|20200702:185905|Activate|20210702:000000|20210119:050000|20210119:050000
8800010074||1006|03|20200702:190321|Activate|20210702:000000|20210119:050000|20210119:050000
EOF;
// put content to page cache , will save data by os
fwrite($csvFP, $csvStr);
// update content to system cache
fflush($csvFP);
// sync system cache to disk
fsync($csvFP);
fclose($csvFP);
// make sure the file exist , do not exist the process will timeout
if (($stream01 = fopen($csvFilePath, 'rb')) !== false) {
    while (($row = fgetcsv($stream01, 1024, '|')) !== false) {
        print_r($row);
    }
    fclose($stream01);
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * file_get_content and file_put_content
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$filename = '../tmp/file_exist.txt';
if (!file_exists($filename)) {
    file_put_contents($filename, 'the file does not exist, create new one');
    echo sprintf('%s not exist,create a new one', $filename), PHP_EOL;
} else {
    $str = file_get_contents($filename);
    echo sprintf('%s file exists,content : %s', $filename, $str), PHP_EOL;
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * file function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fileData = file($csvFilePath);
print_r($fileData);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * get file property
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('File last accessed time : %s', fileatime($csvFilePath)), PHP_EOL;
echo sprintf('File last changed time : %s', filectime($csvFilePath)), PHP_EOL;
echo sprintf('File last modified time : %s', filemtime($csvFilePath)), PHP_EOL;
echo sprintf('File owner : %s', fileowner($csvFilePath)), PHP_EOL;
echo sprintf('File group : %s', filegroup($csvFilePath)), PHP_EOL;
echo sprintf('File inode : %s', fileinode($csvFilePath)), PHP_EOL;
echo sprintf('File permission mode : %s', fileperms($csvFilePath)), PHP_EOL;
echo sprintf('File size : %s', filesize($csvFilePath)), PHP_EOL;
echo sprintf('File type : %s', filetype($csvFilePath)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * flock example
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fp02 = fopen('../tmp/test_flock.txt', 'wb');
if (flock($fp02, LOCK_EX)) {
    fwrite($fp02, "Process 1 write data here" . PHP_EOL);
    fflush($fp02);
    fsync($fp02);
    echo 'Get the lock to write data', PHP_EOL;
} else {
    echo 'Cannot get the lock to write data', PHP_EOL;
}
fclose($fp02);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fnmatch function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('Find the var file : %s', $matchStr = fnmatch('var*', 'var_test.txt') ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fpassthru() function, output the file point to EOF data
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fp03 = fopen($csvFilePath, 'rb');
echo sprintf('output %d char', fpassthru($fp03)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * create new csv
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$csvList = [];
for ($i = 0; $i < 20; $i++) {
    $csvList[] = ['number' => $i, 'name' => 'test_' . $i, 'created_at' => date('Y-m-d')];
}
$csvFilePoint = fopen('../tmp/csv_mock_data.csv', 'wb');
foreach ($csvList as $row) {
    fputcsv($csvFilePoint, $row);
}
fclose($csvFilePoint);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fread() function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$csvFilePoint = fopen('../tmp/csv_mock_data.csv', 'rb');
echo fread($csvFilePoint, 1024) . PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fscanf() function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fOpen01 = fopen('../tmp/csv_mock_data.csv', 'rb');
while ($data = fscanf($fOpen01, '%s,%s,%s' . PHP_EOL)) {
    [$number, $name, $date] = $data;
    echo sprintf('number : %s ; name : %s ; data : %s', $number, $name, $date), PHP_EOL;
}
fclose($fOpen01);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * fseek() function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fOpen02 = fopen('../tmp/csv_mock_data.csv', 'rb');
// back to start
fseek($fOpen02, 0);
echo sprintf('fTell location : %s', ftell($fOpen02)), PHP_EOL;
print_r(fstat($fOpen02)) . PHP_EOL;
fclose($fOpen02);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

/**
 * ftruncate() function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$fOpen03 = fopen('../tmp/csv_mock_data.csv', 'a+b');
echo sprintf('file size : %s', filesize('../tmp/csv_mock_data.csv')), PHP_EOL;
ftruncate($fOpen03, 100);
fclose($fOpen03);
clearstatcache();
echo sprintf('file size : %s', filesize('../tmp/csv_mock_data.csv')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * glob() function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
foreach (glob("../tmp/*.txt") as $filename) {
    echo "$filename size " . filesize($filename) . PHP_EOL;
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * useful function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('/tmp is dir : %s', is_dir('/tmp') ? 'true' : 'false'), PHP_EOL;
echo sprintf('../tmp/csv_mock_data.csv can exec : %s', is_executable('../tmp/csv_mock_data.csv') ? 'true' : 'false'), PHP_EOL;
echo sprintf('../tmp/csv_mock_data.csv can readable : %s', is_readable('../tmp/csv_mock_data.csv') ? 'true' : 'false'), PHP_EOL;
echo sprintf('../tmp/csv_mock_data.csv can writeable : %s', is_writable('../tmp/csv_mock_data.csv') ? 'true' : 'false'), PHP_EOL;
echo sprintf('../tmp/csv_mock_data.csv from upload : %s', is_uploaded_file('../tmp/csv_mock_data.csv') ? 'true' : 'false'), PHP_EOL;
echo sprintf('../tmp/csv_mock_data.csv is file : %s', is_file('../tmp/csv_mock_data.csv') ? 'true' : 'false'), PHP_EOL;
echo sprintf('../tmp/csv_mock_data.csv is link symbol : %s', is_link('../tmp/csv_mock_data.csv') ? 'true' : 'false'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

/**
 * file link function
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
// hard link
link('../tmp/csv_mock_data.csv', '../tmp/csv_mock_data_hard_link.csv');
// symbol link
symlink('../tmp/csv_mock_data.csv', '../tmp/csv_mock_data_symbol_link.csv');
//lchgrp('../tmp/csv_mock_data_hard_link.csv',0);
//lchown('../tmp/csv_mock_data_hard_link.csv','0');
print_r(linkinfo('../tmp/csv_mock_data__hard_link.csv'));
print_r(lstat('../tmp/csv_mock_data_hard_link.csv'));
unlink('../tmp/csv_mock_data_link.csv');
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * move uploaded file
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
mkdir('../tmp/upload/', 0755, true);
$fileName01 = '../tmp/csv_mock_data.csv';
move_uploaded_file($fileName01, sprintf('../tmp/upload/%s', basename($fileName01)));
rmdir('../tmp/upload/');
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * parse_ini
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$config = <<<EOF
[first_section]
one = 1
five = 5
animal = BIRD

[second_section]
path = "/usr/local/bin"
URL = "http://www.example.com/~username"

[third_section]
phpversion[] = "5.0"
phpversion[] = "5.1"
phpversion[] = "5.2"
phpversion[] = "5.3"
EOF;
$readFromStr = parse_ini_string($config);
file_put_contents('../tmp/sample.ini', $config);
$readFromFile = parse_ini_file('../tmp/sample.ini');
print_r($readFromStr);
print_r($readFromFile);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * pathinfo
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$pathParts = pathinfo('./index.php');
print_r($pathParts);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * popen and pclose
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$handle = popen("/bin/ls", "r");
echo $handle, PHP_EOL;
pclose($handle);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * read file , output the file
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$file = '../tmp/sample.ini';
if (file_exists($file)) {
//    header_remove();
//    header('Content-Description: File Transfer');
//    header('Content-Type: application/octet-stream');
//    header('Content-Disposition: attachment; filename="' . basename($file) . '"');
//    header('Expires: 0');
//    header('Cache-Control: must-revalidate');
//    header('Pragma: public');
//    header('Content-Length: ' . filesize($file));
    readfile($file);
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * cache info get
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(realpath_cache_get());
echo sprintf('cache size : %s', realpath_cache_size()), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * real path
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$filePath2 = '../tmp/sample.ini';
echo sprintf('../tmp/sample.ini real path : %s', realpath($filePath2)), PHP_EOL;
rename($filePath2, '../tmp/sample_02.ini');
echo sprintf('../tmp/sample.ini rename to %s', 'sample_02.ini'), PHP_EOL;
print_r(stat('../tmp/sample_02.ini'));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * create unique name file
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$tmpName = tempnam("../tmp", 'unique_file');
$handle = fopen($tmpName, "wb");
fwrite($handle, "writing to temp file");
fclose($handle);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * create tmp file
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$temp = tmpfile();
fwrite($temp, "writing to temp file");
fseek($temp, 0);
echo fread($temp, 1024);
print_r(fstat($temp));
fclose($temp);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * use touch to create file
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
if (touch('../tmp/touch_new_file')) {
    echo '../tmp/touch_new_file' . ' modification time has been changed to present time', PHP_EOL;
} else {
    echo 'Sorry, could not change modification time of ' . $filename, PHP_EOL;
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * umask function usage
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
touch('../tmp/do_not_umask.txt');
echo sprintf('%s permission is %s', '../tmp/do_not_umask.txt', substr(sprintf('%o', fileperms('../tmp/do_not_umask.txt')), -4)), PHP_EOL;
umask(0222);
touch('../tmp/umask.txt');
echo sprintf('%s after umask , permission is %s', '../tmp/umask.txt', substr(sprintf('%o', fileperms('../tmp/umask.txt')), -4)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

/**
 * remove all tmp files
 */
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
$tmpList = scandir('../tmp/');
foreach ($tmpList as $file) {
    if (is_file(sprintf('../tmp/%s', $file))) {
        unlink(sprintf('../tmp/%s', $file));
    }
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;



































