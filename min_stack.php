<?php

class MinStack {
    private array $stack = [];

    function push($val) {
        if ($this->stack === []) {
            $this->stack[] = [
                'val' => $val,
                'min' => $val
            ];
            return;
        }

        $top = $this->stack[count($this->stack) - 1];
        $this->stack[] = [
            'val' => $val,
            'min' => min($top['min'], $val),
        ];
    }

    function pop(): int {
        return array_pop($this->stack)['val'] ?? 0;
    }

    function top(): int {
        return $this->stack[count($this->stack) - 1]['val'] ?? 0;
    }

    function getMin(): int {
        return $this->stack[count($this->stack) - 1]['min'] ?? 0;
    }
}

$stack = new MinStack();
$stack->push('-2');
$stack->push('0');
$stack->push('-3');
echo $stack->getMin() === -3 ? "true\n" : "false\n";
$stack->pop();
echo $stack->top() === 0 ? "true\n" : "false\n";
echo $stack->getMin() === -2 ? "true\n" : "false\n";
