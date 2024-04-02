<?php
/**
 * Created by PhpStorm.
 * Date: 2023/4/6 18:22
 */

namespace App\yield\iterator;

use ReturnTypeWillChange;

class IteratorRange implements \Iterator
{
    protected int $start;
    protected int $limit;
    protected int $step;
    protected int $current;

    public function __construct($start, $limit, $step = 1)
    {
        $this->start = $start;
        $this->limit = $limit;
        $this->step = $step;
    }

    public function rewind(): void
    {
        $this->current = $this->start;
    }

    public function next(): void
    {
        $this->current += $this->step;
    }

    public function current(): int
    {
        return $this->current;
    }

    public function key(): int
    {
        return $this->current + 1;
    }

    public function valid(): bool
    {
        return $this->current <= $this->limit;
    }
}