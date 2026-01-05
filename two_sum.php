<?php

# https://leetcode.com/problems/two-sum/submissions/1864445311/

final readonly class Solution
{
    function twoSum(array $nums, int $target): array {
        $map = [];

        foreach ($nums as $i => $num) {
            $balance = $target - $num;

            if (isset($map[$balance])) {
                return [$map[$balance], $i];
            }

            $map[$num] = $i;
        }

        return [];
    }
}


$t = new Solution();
echo ($t->twoSum([2, 7, 11, 15], 9) === [0, 1]) . "\n";
