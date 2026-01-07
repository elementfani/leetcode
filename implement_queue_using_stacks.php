<?php

class MyQueue
{
    /**
     * @var int[]
     */
    private array $stack = [];

    function push(int $x): void {
        $this->stack[] = $x;
    }

    function pop(): int {
        return array_shift($this->stack);
    }

    function peek(): int {
        return $this->stack[0];
    }

    function empty(): bool {
        return $this->stack === [];
    }
}

$queue = new MyQueue();
$queue->push(1);
$queue->push(2);
echo $queue->peek() === 1 ? "true\n" : "false\n";
echo $queue->pop() === 1 ? "true\n" : "false\n";
echo !$queue->empty() ? "true\n" : "false\n";

