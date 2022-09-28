<?php
/**
 * Created by PhpStorm.
 * Date: 2022/9/27 17:43
 */

namespace App\OOP;

class Person
{
    public function __construct(private $name = '', private $address = 'default')
    {
        echo sprintf('%s call __construct', date('Y-m-d H:i:s')), PHP_EOL;
    }

    public function __invoke(): string
    {
        echo sprintf('%s call __invoke', date('Y-m-d H:i:s')), PHP_EOL;

        return 'You invoke the object' . PHP_EOL;
    }

    /**
     * this function cannot trigger , maybe some bug
     * @param array $an_array
     * @return Person
     */
    public static function __set_state(array $an_array): Person
    {
        echo sprintf('%s call __set_state', date('Y-m-d H:i:s')), PHP_EOL;

        $person = new self();
        $person->name = $an_array['name'] ?? 'set_state_name';

        return $person;
    }

    public function __toString(): string
    {
        echo sprintf('%s call __toString', date('Y-m-d H:i:s')), PHP_EOL;

        return sprintf('I am %s', $this->name) . PHP_EOL;
    }

    public function __destruct()
    {
        echo sprintf('%s call __destruct', date('Y-m-d H:i:s')), PHP_EOL;
    }

    public function __isset(string $name): bool
    {
        echo sprintf('%s call __isset', date('Y-m-d H:i:s')), PHP_EOL;

        return $this->$$name;
    }

    public function __unset(string $name)
    {
        echo sprintf('%s call __unset', date('Y-m-d H:i:s')), PHP_EOL;
        if (isset($this->$$name)) {
            unset($this->$$name);
        }
    }

    public function __set(string $name, $value): void
    {
        echo sprintf('%s call __set', date('Y-m-d H:i:s')), PHP_EOL;
        $this->name = match ($name) {
            'name' => $value,
            default => '',
        };
    }

    public function __get(string $name)
    {
        echo sprintf('%s call __get', date('Y-m-d H:i:s')), PHP_EOL;

        return match ($name) {
            'name' => $this->name,
            default => '',
        };
    }

    public function __call(string $name, array $arguments)
    {
        echo sprintf('%s call __call , un define function %s , parameter : %s', date('Y-m-d H:i:s'), $name, implode(', ', $arguments)), PHP_EOL;
    }

    public static function __callStatic(string $name, array $arguments)
    {
        echo sprintf('%s call __callStatic , un define static function %s , parameter : %s', date('Y-m-d H:i:s'), $name, implode(', ', $arguments)), PHP_EOL;
    }

    /**
     * it will exec before serializing obj
     * @return string[]
     */
    public function __sleep(): array
    {
        echo sprintf('%s call __sleep', date('Y-m-d H:i:s')), PHP_EOL;
        /**
         * serialize the property `name` , unset the property `address`
         */
        $this->name = base64_encode('sleep name');

        return ['name'];
    }

    /**
     * it will exec before un-serializing obj
     * @return void
     */
    public function __wakeup(): void
    {
        echo sprintf('%s call __wakeup', date('Y-m-d H:i:s')), PHP_EOL;
        $this->name = base64_decode($this->name) . ' -> ' . 'wakeup name';
    }

//    public function __serialize(): array
//    {
//        echo sprintf('%s call __serialize', date('Y-m-d H:i:s')), PHP_EOL;
//        $this->name = 'serialize name';
//
//        return ['name' => $this->name];
//    }

//    public function __unserialize(array $data): void
//    {
//        echo sprintf('%s call __unserialize', date('Y-m-d H:i:s')), PHP_EOL;
//
//        $this->name = $data['name'];
//    }
    public function __clone(): void
    {
        echo sprintf('%s call __clone', date('Y-m-d H:i:s')), PHP_EOL;
    }
}
