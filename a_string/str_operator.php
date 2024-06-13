<?php
require_once '../vendor/autoload.php';

$str = 'I love u so much';
dump($a = explode(' ', $str, 3));;
dump(implode(',', $a));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

[$month, $day, $year] = sscanf("January 01 2000", "%s %d %d");
echo sprintf('%d %d %s', $year, $day, $month), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$str = 'The lazy fox jumped over the fence';
echo str_contains($str, 'jumped') ? sprintf('has jumped : %s\n', 'yes') : sprintf('has jumped : %s\n', 'no');
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$str02 = 'str start with The lazy';
echo str_ends_with($str, 'fence') ? 'yes' : 'no', PHP_EOL;
echo str_starts_with($str, 'The lazy') ? 'yes' : 'no', PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$csvStr = <<<EOF
"1","PEN","red"  
"2","Book","green"
"3","Book2","orange"
EOF;
$rows = str_getcsv($csvStr, "\n", ',');
dump($rows);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$bodyTag01 = str_replace("%body%", "black", "<body text=%BODY%>");
$bodyTag02 = str_ireplace("%body%", "black", "<body text=%BODY%>");
echo $bodyTag01, PHP_EOL, $bodyTag02, PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo str_pad("input", 10, "#", STR_PAD_BOTH), PHP_EOL;
echo str_pad("input", 10, "#", STR_PAD_LEFT), PHP_EOL;
echo str_pad("input", 10, "#"), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo str_repeat("-=", 10), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// shuffle , mix up
echo str_shuffle('I am a big boy'), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$str = "Hello Friend";
$arr1 = str_split($str);
$arr2 = str_split($str, 3);
dump($arr1);
dump($arr2);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

//0. count the word   1.return all the word   2. return the assoc array
$str = "Hello fri3nd, you're looking          good today!";
echo sprintf('contain words : %d', str_word_count($str)), PHP_EOL;
echo 'Return all words', PHP_EOL;
dump(str_word_count($str, 1));
echo 'Return all words appearance, key is location , value is word', PHP_EOL;
dump(str_word_count($str, 2));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
// strcasecmp,strncasecmp,strncmp,strncasecmp      can input the `length`
$var1 = "Hello";
$var2 = "hello";
echo sprintf('val1  ===  val2 is %s', strcasecmp($var1, $var2) === 0 ? 'ture' : 'false'), PHP_EOL;
echo sprintf('val1  ===  val2 is %s', strcmp($var1, $var2) === 0 ? 'ture' : 'false'), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$a = 'a';
$b = 'A';
setlocale(LC_COLLATE, 'de_DE');
echo "de_DE: " . strcoll($a, $b), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// strchr = strstr
$email = 'name@example.com';
echo strstr($email, '@'), PHP_EOL;    // @example.com
echo strstr($email, '@', true), PHP_EOL; // name
echo stristr($email, 'EXAMPLE'), PHP_EOL;  // example.com
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// strcspn  find str2 char in str1 -> return the position in str1 , cannot find -> it will return the string length
$filename = '*test.img';
$forbidden = "\"\\?*:/@|<>";
dump(sprintf('strlen("%s") === strcspn("%s", "%s") = %s', $filename, $filename, $forbidden, strlen($filename) === strcspn($filename, $forbidden)));;
dump(sprintf('strcspn("Hello world!", "w", 0, 6) = %s', strcspn("Hello world!", "w", 0, 6)));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// stripos , strpos , if string2 in string1,return index, if not return false
dump(sprintf('stripos("test.com", "test") = %s', stripos('test.com', 'test')));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// strlen
$str = 'enhancement';
dump(sprintf('strlen("%s") = %s', $str, strlen($str)));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// strnatcasecmp , strnatcmp  eg . a < a0 < a1 < a1a < a1b < a2 < a10 < a20,  1.001 < 1.002 < 1.010 < 1.02 < 1.1 < 1.3
// if string1 < string2, return -1 , if string1 > string2, return 1 , string1 = string, return 0
dump(sprintf('strnatcasecmp("a", "a0") = %s', strnatcasecmp('a', 'a0')));
dump(sprintf('strnatcmp("a", "A0") = %s', strnatcmp('a', 'A0')));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// ucfirst ucwords
$str = 'hello world!';
dump(sprintf('ucfirst("%s") = %s', $str, ucfirst($str)));
dump(sprintf('ucwords("%s") = %s', $str, ucwords($str)));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;