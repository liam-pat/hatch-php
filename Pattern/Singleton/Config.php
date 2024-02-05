<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/5 10:32
 */

namespace App\Pattern\Singleton;
class Config extends Singleton
{
    private array $hashmap = [];

    public function getValue(string $key): string
    {
        return $this->hashmap[$key];
    }

    public function setValue(string $key, string $value): void
    {
        $this->hashmap[$key] = $value;
    }
}
