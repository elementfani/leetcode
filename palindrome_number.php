<?php

class Solution {

    /**
     * @param Integer $x
     * @return Boolean
     */
    function isPalindrome($x) {
        $a = str_split($x);
        $count = count($a);
        $center = floor($count/2);

        foreach ($a as $i => $left) {
            if ($left !== $a[$count-$i-1]) {
                return false;
            }

            if ($i === $center) {
                break;
            }
        }

        return true;
    }
}
