<?php
function generateV5(string $namespace, string $salt): string
{
    // Get hexadecimal components of namespace
    $nhex = str_replace(['-', '{', '}'], '', $namespace);
    // Binary Value
    $nstr = '';
    // Convert Namespace UUID to bits
    for ($i = 0; $i < strlen($nhex); $i += 2) {
        $nstr .= chr((int)hexdec($nhex[$i] . $nhex[$i + 1]));
    }
    // Calculate hash value
    $hash = sha1($nstr . $salt);

    return sprintf(
        '%08s%04s%04x%04x%12s',
        // 32 bits for "time_low"
        substr($hash, 0, 8),
        // 16 bits for "time_mid"
        substr($hash, 8, 4),
        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 3
        (hexdec(substr($hash, 12, 4)) & 0x0fff) | 0x3000,
        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        (hexdec(substr($hash, 16, 4)) & 0x3fff) | 0x8000,
        // 48 bits for "node"
        substr($hash, 20, 12)
    );
}

function generateV4(): string
{
    return sprintf(
        '%04x%04x%04x%04x%04x%04x%04x%04x',
        // 32 bits for "time_low"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        // 16 bits for "time_mid"
        mt_rand(0, 0xffff),
        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        mt_rand(0, 0x0fff) | 0x4000,
        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        mt_rand(0, 0x3fff) | 0x8000,
        // 48 bits for "node"
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0xffff)
    );
}

var_dump(generateV5(generateV4(),  php_uname('n')));
var_dump(php_uname('n'));