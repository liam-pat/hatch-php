<?php
/**
 * quote a-z
 */
$str = '\t \n I am a student';
echo sprintf("str '%s' encode = '%s' ", $str, addcslashes($str, 'a..z')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * just quote   ' " 、 NUL
 */
$str1 = "She 's shoe is wide. NUL";
echo sprintf("str1 '%s' encode = '%s' ", $str1, addslashes($str1)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * bin to hex
 */
$data = "וּמִפְּרִ֣י הָעֵץ֮ אֲשֶׁ֣ר בְּתוֹךְ־הַגָּן֒ אָמַ֣ר אֱלֹהִ֗ים לֹ֤א תֹֽאכְלוּ֙ מִמֶּ֔נּוּ וְלֹ֥א תִגְּע֖וּ בּ֑וֹ פֶּן־תְּמֻתֽוּן׃ ";
echo sprintf('date to hex : %s', bin2hex($data)), PHP_EOL;
echo sprintf('hex to bin : %s', hex2bin('6578616d706c65206865782064617461')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * chr and ord , int => a-z A-Z
 */
echo sprintf('int 64 to char : %s', chr(64)), PHP_EOL;
echo sprintf('a to int : %d', ord('a')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * split str
 */
$base64Str = base64_encode('test');
echo sprintf('str `%s` chuck split : %s', $base64Str, chunk_split($base64Str, 1, '@')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * uuencode and uu decode
 */
$str2 = 'original code';
echo sprintf('str encode = %s, str decode = %s', $a = convert_uuencode($str2), convert_uudecode($a)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * count chars
 */
foreach (count_chars('I love u', 1) as $key => $val) {
    echo "There were $val instance(s) of \"", chr($key), "\" in the string.\n";
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * crc32 validate func
 */
echo sprintf('%u \n', crc32('test')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * crypt function
 */
echo sprintf('crypt str : %s', crypt('I love u', time())), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * explode fun
 */
$str01 = 'I love u so much';
print_r($a = explode(' ', $str01, 3));;
echo implode(',', $a), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * html_translation_table .
 */
//print_r(get_html_translation_table(HTML_ENTITIES, ENT_HTML5, 'UTF-8'));
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * html entities
 */
$orig = "I'll \"walk\" the <b>dog</b> now";
echo sprintf("---- html entities : %s \n---- html entity decode : %s", $a = htmlentities($orig), html_entity_decode($a)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * html special chars
 */
$orig = <<<EOF
<p color="red">Title</p>
EOF;
echo sprintf("---- html special char : %s \n---- html special char decode : %s", $a = htmlspecialchars($orig, ENT_COMPAT, 'UTF-8'), htmlspecialchars_decode($a, ENT_COMPAT)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * convert first char to low case
 */
echo lcfirst('HELLO'), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * localeconv
 */
print_r(localeconv());
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * calc file md5 valude
 */
echo sprintf('file : %s ,md5 str : %s', './index.php', md5_file('./index.php')), PHP_EOL;
echo sprintf('md5 str : %s ', md5(time())), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * nl_langinfo
 */
echo nl_langinfo(YESEXPR), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * nl 2 br
 */
echo nl2br("Welcome\r\nThis is my HTML document", false), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * number format
 */
$number = 1234.56;
echo sprintf('number : %s format to %s', $number, number_format($number, 2, '.', ',')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * parse str
 */
$str = "first=value&arr[]=foo+bar&arr[]=baz";
parse_str($str, $output);
print_r($output);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * quoted_printable_encode
 */
$str = 'test test test';
echo sprintf('encode str : %s , decode str : %s', $a = quoted_printable_encode($str), quoted_printable_decode($a)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * quotemeta
 */
$str = "Hello world. (can you hear me?)";
echo quotemeta($str), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * sha1 file
 */
echo sprintf('file : %s ,md5 str : %s', './index.php', sha1_file('./index.php', false)), PHP_EOL;
echo sprintf('md5 str : %s ', sha1(time())), PHP_EOL;;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * str similar test
 */
$var1 = 'PHP IS GREAT';
$var2 = 'WITH MYSQL';
similar_text($var1, $var2, $percent);
echo sprintf('"%s" similar as "%s" , %s percent', $var1, $var2, $percent), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * scanf
 */
$mandate = "January 01 2000";
[$month, $day, $year] = sscanf($mandate, "%s %d %d");
echo sprintf('%s %d %d', $month, $day, $year), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * str contains
 */
$str = 'The lazy fox jumped over the fence';
if (str_contains($str, 'jumped')) {
    echo sprintf('str can get jumped : %s', 'yes'), PHP_EOL;
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * str ends with
 */
if (str_ends_with($str, 'fence')) {
    echo sprintf('str end with fence : %s', 'yes'), PHP_EOL;
}
if (str_starts_with($str, 'The lazy')) {
    echo sprintf('str start with The lazy : %s', 'yes'), PHP_EOL;
}
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * str get csv
 */
$csvStr = <<<EOF
"1","PEN","red"  
"2","Book","green"
"3","Book2","orange"
EOF;
$rows = str_getcsv($csvStr, "\n", ',');
print_r($rows);
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/*
 * str_i replace
 */
$bodyTag01 = str_replace("%body%", "black", "<body text=%BODY%>");
$bodyTag02 = str_ireplace("%body%", "black", "<body text=%BODY%>");
echo $bodyTag01, PHP_EOL;
echo $bodyTag02, PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * string pad
 */
echo str_pad("input", 10, "#", STR_PAD_BOTH), PHP_EOL;
echo str_pad("input", 10, "#", STR_PAD_LEFT), PHP_EOL;
echo str_pad("input", 10, "#"), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
/**
 * string repeat
 */
echo str_repeat("-=", 10), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * rot13 , char +13  ,
 */
echo str_rot13('PHP 4.3.0'), PHP_EOL; // CUC 4.3.0
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * string shuffle , can gen a random str
 */
echo str_shuffle('I am a big boy'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * string split
 */
$str = "Hello Friend";
$arr1 = str_split($str);
$arr2 = str_split($str, 3);
print_r($arr1);
print_r($arr2);
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * string word count
 */
$str = "Hello fri3nd, you're looking          good today!";
echo sprintf('str contain word : %s', str_word_count($str)), PHP_EOL;
echo 'Return all words', PHP_EOL;
print_r(str_word_count($str, 1));
echo 'Return all words appearance, key is location , value is word', PHP_EOL;
print_r(str_word_count($str, 2));
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strcasecmp ,strcmp
 * strncasecmp,strncmp , diff is the len param
 */
$var1 = "Hello";
$var2 = "hello";
echo sprintf('val1  ===  vale is %s', strcasecmp($var1, $var2) === 0 ? 'ture' : 'false'), PHP_EOL;
echo sprintf('val1  ===  vale is %s', strcmp($var1, $var2) === 0 ? 'ture' : 'false'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;

/**
 * set locale to compare
 */
$a = 'a';
$b = 'A';
setlocale(LC_COLLATE, 'de_DE');
echo "de_DE: " . strcoll($a, $b), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strchr = strstr
 */
$email = 'name@example.com';
echo strstr($email, '@'), PHP_EOL;
echo strstr($email, '@', true), PHP_EOL;
echo stristr($email, 'EXAMPLE'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strcspn
 * can find str2 char in str1 , it will return the position in str1
 * cannot find any str2 char in str1 , it will return the string length
 */
$forbidden = "\"\\?*:/@|<>";
if (strlen('*test.file') !== strcspn('*test.file', $forbidden)) {
    echo "you cant create a file with that name!";
}
echo sprintf('w position is %d', strcspn("Hello world!", "w", 0, 6)), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strip_tags
 */
$text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a> <br>';
echo strip_tags($text, '<br>'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * stripcslashes
 */
$jsonStr = '"{\"resourceId\":\"dfead70e4ec5c11e43514000ced0cdcaf\",\"properties\":{\"process_id\":\"process4\",\"name\":\"\",\"documentation\":\"\",\"processformtemplate\":\"\"}}"';
//echo addcslashes($csvStr, 'UTF-8'), PHP_EOL;
echo stripcslashes($jsonStr), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * stripos and strpos
 */
if (stripos('test.com', 'test') !== false) {
    echo sprintf('exist test : %s', 'yes'), PHP_EOL;
}
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * stripslashes
 */
$str = "Is your name O\'reilly?";
echo stripslashes($str), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * str len
 */
echo strlen($str), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strnatcasecmp , strnatcmp
 * eg . a < a0 < a1 < a1a < a1b < a2 < a10 < a20
 * 1.001 < 1.002 < 1.010 < 1.02 < 1.1 < 1.3
 */
echo strnatcasecmp('a', 'a0'), PHP_EOL;
echo strnatcmp('a', 'A0'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strncasecmp , strncmp
 */
echo strncmp('aa', 'AA0', 3), PHP_EOL;
echo strncasecmp('aa', 'aa0', 3), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strpbrk
 */
$text = 'This is a Simple text.';
echo strpbrk($text, 'mi'), PHP_EOL;
echo strpbrk($text, 'S'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strpos,stripos
 */
$t1 = 'test01';
$t2 = 'Test';
echo sprintf('stripos(%s,%s) = %s', $t1, $t2, stripos($t1, $t2)), PHP_EOL;
echo sprintf('strpos(%s,%s) = %s', $t1, $t2, strpos($t1, $t2) ? 'true' : 'false'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strrops strripos
 */
$t1 = 'ababababab';
$t2 = 'ab';
echo sprintf('strrpos(%s,%s) = %s', $t1, $t2, strrpos($t1, $t2)), PHP_EOL;
echo sprintf('strripos(%s,%s) = %s', $t1, $t2, strripos($t1, $t2) ? 'true' : 'false'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strrchr
 */
$text = "Line 1\nLine 2\nLine 3";
echo strrchr($text, 'Line'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strrev
 */
echo strrev("Hello world!"), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strspn , character contains in string count
 */
echo strspn("foo", "o", 1, 2), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strstr
 */
echo strstr('name@example.com', '@'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strtok , first time need the string
 */
$tok = strtok("This is\tan example\nstring", " \n\t");
while ($tok !== false) {
    echo "Word=$tok", PHP_EOL;
    $tok = strtok(" \n\t");
}
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strtolower and strtoupper
 */
$str = 'AbCdEfGhIjKLm';
echo strtoupper($str), PHP_EOL;
echo strtolower($str), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strtr
 */
$str = 'hi all, I said hello';
echo strtr($str, "hi", "hello"), PHP_EOL;
echo strtr($str, ["hello" => "hi", "hi" => "hello"]), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * substr_compare
 */
echo substr_compare("abcde", "bc", 1, 2);
echo substr_compare("abcde", "de", -2, 2);
echo substr_compare("abcde", "bcg", 1, 2, true);
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * substr_count
 */
$text = 'This is a test';
echo substr_count($text, 'is');
echo substr_count($text, 'is', 3, 3);
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * substr_replace
 */
$str = 'ABCDEFGH:/MNRPQR/';
echo substr_replace($str, 'bob', 0), PHP_EOL;
echo substr_replace($str, 'bob', 0, 0), PHP_EOL; // insert to front of the string
echo substr_replace($str, 'bob', strlen($str)), PHP_EOL; // insert to end of the string
echo substr_replace($str, '', 10, -1); // remove some str
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * substr
 */
echo substr("abcdef", -1), PHP_EOL;
echo substr("abcdef", -2), PHP_EOL;
echo substr("abcdef", -3, 1), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * ucfirst ucwords
 */
$foo = 'hello world!';
echo ucfirst($foo), PHP_EOL;
echo ucwords($foo), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * utf encode and decode . ISO-8859-1 to UTF-8 . DEPRECATED PHP 8.2.0
 */
$str = "\x5A\x6F\xEB";
$utf8Str = utf8_encode($str);
echo bin2hex($utf8Str), "\n";
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * vfprintf,vprintf,vsprintf support the array parameter
 */
if (!($fp = fopen(sprintf('../tmp/vfspint_%s.txt', time()), 'wb'))) {
    return;
}
vfprintf($fp, "%04d-%02d-%02d", ['2022', '12', '30']);
vprintf("%04d-%02d-%02d\n", explode('-', '1988-8-1'));
echo vsprintf("%04d-%02d-%02d\n", explode('-', '1988-8-1'));
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * wordwrap
 */
$str = "A very long woooooooooooord.";
echo wordwrap($str, 8), PHP_EOL;
echo wordwrap($str, 8, "\n", true), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;













































