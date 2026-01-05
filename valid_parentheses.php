<?php

final readonly class Solution
{
    public function isValid($s): bool {
        $pairs = [
            '(' => ')',
            '[' => ']',
            '{' => '}',
        ];
        $parents = [];

        foreach (str_split($s) as $char) {
            if (isset($pairs[$char])) {
                $parents[] = $pairs[$char];
                continue;
            }

            if (count($parents) === 0) {
                return false;
            }

            $parent = array_pop($parents);
            if ($parent !== $char) {
                return false;
            }
        }

        if (count($parents) !== 0) {
            return false;
        }

        return true;
    }
}


$t = new Solution();
echo $t->isValid('()') . "\n";
echo $t->isValid('()[]{}') . "\n";
echo $t->isValid('([])') . "\n";
