<?php
//header("HTTP/1.1 404 Not Found");
header("HTTP/1.1 200");
header("Cache-Control: no-cache");
header("Content-type: text/html");

# open the page ,auto download the file
//header("Content-Disposition:attachment;filename=downloaded.txt");
//readfile("original.txt");

// show all header
var_dump(headers_list());

/**
 *  if set $file $line param , will record headers_sent 's file line
 */
if (!headers_sent($file, $line)) {
    header("Cache-Control: cache");
}
// show all header
var_dump(headers_list());


/**
 * set cookie
 */
setcookie("TestCookie", 'for-testing', time() + 3600 * 24);
/**
 * set cookie but not url encode
 */
setrawcookie("cookie[three]","cookie1");
setrawcookie("cookie[two]","cookie2");
setrawcookie("cookie[one]","cookie3");