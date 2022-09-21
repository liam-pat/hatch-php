<?php
print_r(debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT));

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
print_r(error_get_last());

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
error_clear_last();
print_r(error_get_last());

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
error_log(sprintf('[%s] test err log' . PHP_EOL, date('Y-m-d H:i:s')), 3, '../tmp/err.log');

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
error_reporting(E_ALL ^ E_NOTICE);

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
function unserialize_handler($errno, $errStr)
{
    echo "Invalid serialized value.\n";
}
$serialized = 'foo';
set_error_handler('unserialize_handler');
$original = unserialize($serialized);
restore_error_handler();
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
function exception_handler_1(Exception $e)
{
    echo '[' . __FUNCTION__ . '] ' . $e->getMessage();
}

function exception_handler_2(Exception $e)
{
    echo '[' . __FUNCTION__ . '] ' . $e->getMessage();
}
set_exception_handler('exception_handler_1');
set_exception_handler('exception_handler_2');
restore_exception_handler();
throw new \RuntimeException('This triggers the first exception handler...');

