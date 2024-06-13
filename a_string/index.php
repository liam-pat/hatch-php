<?php

/**
 * strip_tags , remove the specific symbol
 */
$text = '<p>Test paragraph.</p><!-- Comment --> <a href="#fragment">Other text</a> <br>';
echo strip_tags($text, '<br>'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;


/**
 * strncasecmp , strncmp
 */
echo strncmp('aa', 'AA0', 3), PHP_EOL;
echo strncasecmp('aa', 'aa0', 3), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strpbrk,  find char in string
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
 * strrchr, return the last match str
 */
$text = "Line 1\nLine 2\nLine 3";
echo strrchr($text, 'Line'), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * strrev ,reverse the string
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
 * strtr, replace the word
 */
$str = 'hi all, I said hello';
echo strtr($str, "hi", "hello"), PHP_EOL;
echo strtr($str, ["hello" => "hi", "hi" => "hello"]), PHP_EOL;
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * substr_compare , compare the sring
 */
echo substr_compare("abcde", "bc", 1, 2);
echo substr_compare("abcde", "de", -2, 2);
echo substr_compare("abcde", "bcg", 1, 2, true);
echo '</br>', str_repeat('-', 20), '</br>', PHP_EOL;
/**
 * substr_count , count the str
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