<?php

class Solution
{
    function lengthOfLongestSubstring($s) {
        if (strlen($s) <= 1) {
            return strlen($s);
        }

        $array = str_split($s);
        $length = 1;
        $maxLength = $length;

        $from = 0;

        for ($i=0; $i<strlen($s); $i++) {
            $subArray = array_slice($array, $from, $length);
            $uniqCount = count(array_unique($subArray));

            if ($uniqCount === $length) {
                $maxLength = $length;
                $length ++;
            } elseif ($uniqCount < $length) {
                $from ++;
            }
        }

        return $maxLength;
    }
}
