<?php

class Solution
{
    function singleNumber(array $nums): int
    {
        if (count($nums) === 1) {
            return $nums[0];
        }

        sort($nums);
        for ($i = 0; $i < count($nums); $i = $i + 2) {
            $left = $nums[$i] ?? null;
            $right = $nums[$i + 1] ?? null;

            if ($left !== $right) {
                return $left;
            }
        }

        return 0;
    }
}

$s = new Solution();

echo $s->singleNumber([2, 2, 1]) === 1 ? "true\n" : "false\n";
echo $s->singleNumber([4, 1, 2, 1, 2]) === 4 ? "true\n" : "false\n";
echo $s->singleNumber([1]) === 1 ? "true\n" : "false\n";

