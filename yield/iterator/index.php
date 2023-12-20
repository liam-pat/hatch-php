<?php
/**
 * Created by PhpStorm.
 * Date: 2023/4/6 18:22
 */


function range($start, $end, $step = 1)
{
    $ret = [];

    for ($i = $start; $i <= $end; $i += $step) {
        $ret[] = $i;
    }

    return $ret;
}

foreach (new InfiniteIterator(0, 9) as $key => $val) {
    echo $key, ' ', $val, "\n";
}

$startMemory = memory_get_usage();
$arr = range(0, 500000);
echo 'range(): ', memory_get_usage() - $startMemory, " bytes\n";

unset($arr);

$startMemory = memory_get_usage();
$arr = new Xrange(0, 500000);
echo 'xrange(): ', memory_get_usage() - $startMemory, " bytes\n";

