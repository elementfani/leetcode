<?php

class Solution
{
    function sortedSquares(array $nums): array
    {
        foreach ($nums as &$num) {
            $num = $num * $num;
        }

        sort($nums);
        return $nums;
    }
}

$s = new Solution();
echo $s->sortedSquares([-4, -1, 0, 3, 10]) === [0, 1, 9, 16, 100] ? "true\n" : "false\n";