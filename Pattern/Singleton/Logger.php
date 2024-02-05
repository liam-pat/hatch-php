<?php
/**
 * Created by PhpStorm.
 * Date: 2024/2/5 10:26
 */

namespace App\Pattern\Singleton;

class Logger extends Singleton
{
    private $fileHandle;

    protected function __construct()
    {
        parent::__construct();
        $this->fileHandle = fopen('php://stdout', 'w');
    }

    public function write(string $msg): void
    {
        fwrite($this->fileHandle, date('Y-m-d H:i:s') . " : " . $msg . PHP_EOL);
    }

    public static function log(string $msg): void
    {
        $logger = static::getInstance();
        $logger->write($msg);
    }
}
