<?php

class Solution
{
    function strStr(string $haystack, string $needle): int {
        $from = 0;
        $haystackLen = strlen($haystack);
        $needleLen = strlen($needle);

        if ($haystackLen < $needleLen) {
            return -1;
        }

        while (true) {
            if (substr($haystack, $from, $needleLen) == $needle) {
                return $from;
            }

            if ($from === $haystackLen - $needleLen + 1) {
                return -1;
            }

            $from ++;
        }
    }
}

$s = new Solution();
echo $s->strStr('sadbutsad', 'sad') === 0;
