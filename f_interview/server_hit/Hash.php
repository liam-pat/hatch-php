<?php

namespace App\f_interview\server_hit;

class Hash
{
    use HashTools;

    private array $serverList = array();

    private bool $isSorted = false;

    public function addServer($server): true
    {
        $hash = $this->mHash1($server);

        if (!isset($this->serverList[$hash])) {
            $this->serverList[$hash] = $server;
        }

        $this->isSorted = false;

        return true;
    }

    public function removeServer($service): true
    {
        $hash = $this->mHash1($service);

        if (isset($this->serverList[$hash])) {
            unset($this->serverList[$hash]);
        }

        $this->isSorted = false;

        return true;
    }

    public function lookup($key)
    {
        $hash = $this->mHash1($key);

        if (!$this->isSorted) {
            krsort($this->serverList, SORT_NUMERIC);
            $this->isSorted = true;
        }

        foreach ($this->serverList as $pos => $server) {
            if ($hash >= $pos) {
                return $server;
            }
        }

        return end($this->serverList);
    }
}