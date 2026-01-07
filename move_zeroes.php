<?php

class Solution
{
    function moveZeroes(array &$nums)
    {
        $numsCount = count($nums);
        $i = 0;

        while ($i < $numsCount) {
            $el = $nums[$i];
            if (0 === $el) {
                unset($nums[$i]);
                $nums[] = 0;
            }

            $i ++;
        }

        $nums = array_values($nums);
    }
}

$s = new Solution();

$array = [0, 1, 0, 3, 12];
$s->moveZeroes($array);
echo $array === [1, 3, 12, 0, 0] ? "true\n" : "false\n";

