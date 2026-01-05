<?php

final class Solution
{
    function majorityElement(array $nums) {
        $counts = [];

        foreach ($nums as $num) {
            if (!isset($counts[$num])) {
                $counts[$num] = 0;
            }
            $counts[$num] ++;
        }

        arsort($counts);
        $keys = array_keys($counts);

        return $keys[0];
    }
}

$s = new Solution();

echo $s->majorityElement([3,2,3]) === 3 ? "true\n" : "false\n";
echo $s->majorityElement([2,2,1,1,1,2,2]) === 2 ? "true\n" : "false\n";
