<?php
require_once "../vendor/autoload.php";

dump(sprintf('php version searched , key : %s', array_search('52', ["php", 4.0, ["green", "red"], 'nginx' => '52'], true)));
echo str_repeat('---------------------------------------------------', 2) . str_repeat('---------------------------------------------------', 2), PHP_EOL;
