<?php
/**
 * Created by PhpStorm.
 * Date: 2023/2/16 10:56
 */

use \App\yield\corountine\Scheduler;

require_once '../../vendor/autoload.php';
function generate1(): Generator
{
    for ($i = 1; $i <= 10; ++$i) {
        echo "This is task 1 iteration $i.\n";
        yield;
    }
}

function generate2(): Generator
{
    for ($i = 1; $i <= 5; ++$i) {
        echo "This is task 2 iteration $i.\n";
        yield;
    }
}

$scheduler = new Scheduler();

$scheduler->newTask(generate1());
$scheduler->newTask(generate2());

$scheduler->run();