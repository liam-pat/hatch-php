<?php

namespace App\f_interview\server_hit;

trait HashTools
{
    protected function mHash1($key): float|int
    {
        $md5 = substr(md5($key), 0, 8);
        $seed = 31;
        $hash = 0;

        for ($i = 0; $i < 8; $i++) {
            $hash = $hash * $seed + ord($md5{$i});
            $i++;
        }

        return $hash;
    }
}