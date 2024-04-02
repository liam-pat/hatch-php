<?php
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('abs(-1) = %d', abs(-1)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('17 to hex : %s', base_convert('17', 10, 16)), PHP_EOL;
echo sprintf('17 to bin : %s', base_convert('17', 10, 2)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('(11110000)bin to dec : %d', bindec('11110000')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('(255)dec to bin : %s', decbin('255')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('(47)dec to hex : %s', dechex('47')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('(47)dec to oct : %s', decoct('47')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('(ff)hex to dec : %s', hexdec('ff')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('(77)oct to dec : %s', octdec('77')), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('cell(1.1) = %d', ceil(1.1)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('floor(1.1) = %d', floor(1.1)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('round(1.1) = %d', round(1.1)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('fdiv(4.8,1.1) = %f', fdiv(4.8, 1.1)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('intdiv(4,2) = %d', intdiv(4, 2)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('fmod(4.8,1.1) = %f ， eg. 4 * 1.1 + 0.4 = 4.8', fmod(4.8, 1.1)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('log(0) is infinite : %d', is_infinite(log(0)) ? 1 : 0), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('3 is finite : %d', is_finite(3) ? 1 : 0), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('find the max number : %d', max([1, 2, 3, 5, 7])), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('find the min number : %d', min([1, 2, 3, 5, 7])), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
mt_srand(time());
echo sprintf('mt_random  %d', mt_rand()), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('max random int : %d', mt_getrandmax()), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('2^8 = %d', pow(2, 8)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;

echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
echo sprintf('%s ^2 = 9', sqrt(9)), PHP_EOL;
echo '</br>', '--------------------------------' . '</br>', PHP_EOL;
