<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/5 10:20
 */

namespace App\Pattern\Singleton;

class Singleton
{
    private static array $instances = [];

    protected function __construct()
    {
    }


    protected function __clone()
    {
        // cannot use clone()
    }

    /**
     * @throws \Exception
     */
    public function __wakeup()
    {
        throw new \Exception('cannot unSerialize the singleton');
    }

    public static function getInstance()
    {
        $currentClass = static::class;
        if (!isset(self::$instances[$currentClass])) {

            self::$instances[$currentClass] = new static();
        }

        return self::$instances[$currentClass];
    }
}
