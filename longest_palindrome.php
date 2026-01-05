<?php

final class Solution
{
    function longestPalindrome(string $s) {
        $map = [];
        foreach (str_split($s) as $char) {
            if (!isset($map[$char])) {
                $map[$char] = 0;
            }
            $map[$char] ++;
        }

        arsort($map);
        $result = 0;
        foreach ($map as $char => $count) {
            if ($count % 2 === 0) {
                $result += $count;
                unset($map[$char]);
            } else {
                $result += $count - 1;
            }
        }

        if ($map !== []) {
            $result ++;
        }

        return $result;
    }
}

$s = new Solution();

echo $s->longestPalindrome('abccccdd') === 7 ? "true\n" : "false\n";
echo $s->longestPalindrome('a') === 1 ? "true\n" : "false\n";
