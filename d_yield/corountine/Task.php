<?php
/**
 * Created by PhpStorm.
 * Date: 2023/2/16 10:47
 */

namespace App\yield\corountine;

class Task
{
    protected int $taskId;
    protected \Generator $coroutine;
    // send() 值
    protected ?int $sendVal = null;
    protected bool $isFirstExec = true;

    public function __construct($taskId, \Generator $coroutine)
    {
        $this->taskId = $taskId;
        $this->coroutine = $coroutine;
    }

    public function getTaskId(): int
    {
        return $this->taskId;
    }

    public function setSendValue(int $sendVal): void
    {
        $this->sendVal = $sendVal;
    }

    public function run()
    {
        // 如之前提到的在 send 之前, 当迭代器被创建后第一次 yield 之前，一个 rewind() 方法会被隐式调用
        // 所以实际上发生的应该类似:
        // $this->coroutine->rewind();
        // $this->coroutine->send();

        // 这样 rewind 的执行将会导致第一个 yield 被执行, 并且忽略了他的返回值.
        // 真正当我们调用 yield 的时候, 我们得到的是第二个 yield 的值，导致第一个 yield 的值被忽略。
        // 所以这个加上一个是否第一次 yield 的判断来避免这个问题
        if ($this->isFirstExec) {
            $this->isFirstExec = false;

            return $this->coroutine->current();
        }
        $setGen = $this->coroutine->send($this->sendVal);
        $this->sendVal = null;

        return $setGen;
    }

    public function isFinished(): bool
    {
        return $this->coroutine->valid() === false;
    }
}
