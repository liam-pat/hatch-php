<?php
require_once '../vendor/autoload.php';

$str = '\t \n I am a student';
dump(sprintf("str `%s` encode 2 `%s` ", $str, addcslashes($str, 'a..z')));  // output : "str `\t \n I am a student` encode 2 `\\t \\n I \a\m \a \s\t\u\d\e\n\t`"
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$str1 = "She 's shoe is wide. NUL";
dump(sprintf("str `%s` encode 2 `%s` ", $str1, addslashes($str1))); // output : "str `She 's shoe is wide. NUL` encode 2 `She \'s shoe is wide. NUL`"
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$data = "וּמִפְּרִ֣י הָעֵץ֮ אֲשֶׁ֣ר בְּתוֹךְ־הַגָּן֒ אָמַ֣ר אֱלֹהִ֗ים לֹ֤א תֹֽאכְלוּ֙ מִמֶּ֔נּוּ וְלֹ֥א תִגְּע֖וּ בּ֑וֹ פֶּן־תְּמֻתֽוּן׃ ";
dump(sprintf('bin 2 hex : %s', bin2hex($data)));  //output:
dump(sprintf('hex 2 bin : %s', hex2bin('6578616d706c65206865782064617461'))); //output : "hex 2 bin : example hex data"
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

dump(sprintf('int 64 2 char `%s`', chr(64)));   //output: "int 64 2 char `@`"
dump(sprintf('char a 2 int : %d', ord('a')));   //output: "char a 2 int : 97"
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$str2 = 'I wanna test';
dump(sprintf('str `%s` chuck split : `%s`', $str2, chunk_split($str2, 1, '@')));  // output : "str `I wanna test` chuck split : I@ @w@a@n@n@a@ @t@o@ @t@e@s@t@"
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo sprintf("encode = %s decode = `%s` \n", $a = convert_uuencode('original code'), convert_uudecode($a));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

foreach (count_chars('I love u', 1) as $charInt => $times) {
    echo "There were $times instance(s) of ", chr($charInt), " in the string.\n";
}
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

//dump(get_html_translation_table(HTML_ENTITIES, ENT_HTML5, 'UTF-8'));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$b = "I'll \"walk\" the <b>dog</b> now";
echo sprintf("encode `%s`\ndecode  `%s` \n", $a = htmlentities($b), html_entity_decode($a)), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$p = <<<EOF
<p color="red">Title</p>
EOF;
echo sprintf("encode `%s`\ndecode  `%s` \n", $a = htmlspecialchars($p, ENT_COMPAT, 'UTF-8'), htmlspecialchars_decode($a, ENT_COMPAT)), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo sprintf("lcfirst(HELLO) = %s\n", lcfirst('HELLO'));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

dump(localeconv());
echo nl_langinfo(YESEXPR), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$str01 = "Welcome\r\nThis is my HTML document";
echo sprintf('`%s`' . PHP_EOL, nl2br($str01, false));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo sprintf('%f => %s', 1234.56, number_format(1234.56, 2, '.', ',')), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

$output = [];
parse_str("first=value&arr[]=foo+bar&arr[]=baz", $output);
dump($output);
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

echo sprintf('encode `%s` . decode `%s`', $a = quoted_printable_encode('test test test'), quoted_printable_decode($a)), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// quote meta . including . \ + * ? [ ^ ] ( $ )
echo quotemeta("Hello world. (can you hear me?)"), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

similar_text('PHP IS GREAT', 'WITH MYSQL', $percent);
echo sprintf('deference percent : %s', $percent), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;

// @notice high level
$jsonStr = '"{\"resourceId\":\"dfead70e4ec5c11e43514000ced0cdcaf\",\"properties\":{\"process_id\":\"process4\",\"name\":\"\",\"documentation\":\"\",\"processformtemplate\":\"\"}}"';
echo stripcslashes($jsonStr), PHP_EOL;
$str = "Is your name O\'reilly?";
echo stripslashes($str), PHP_EOL;
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
