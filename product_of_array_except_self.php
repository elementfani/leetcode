<?php

class Solution {

    /**
     * @param int[] $nums
     * @return int[]
     */
    function productExceptSelf(array $nums): array {
        $length = count($nums);
        $out = array_fill(0, $length, 1);
        $prefix = 1;
        $suffix = 1;
        $j = $length - 1;
        // One Pass, two pointers.
        for ($i = 0; $i < $length; $i++) {
            $out[$i] *= $prefix;
            $prefix *= $nums[$i];
            $out[$j] *= $suffix;
            $suffix *= $nums[$j];;
            $j--;
        }
        return $out;
    }
}

$s = new Solution();
echo $s->productExceptSelf([1, 2, 3, 4]) === [24, 12, 8, 6] ? "true\n" : "false\n";
echo $s->productExceptSelf([-1, 1, 0, -3, 3]) === [0, 0, 9, 0, 0] ? "true\n" : "false\n";
