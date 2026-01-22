<?php

class Solution
{
    function compress(string $string): string {
        $result = '';

        $currentChar = substr($string, 0, 1);
        $stringLen = strlen($string);
        $num = 1;

        for ($i = 1; $i < $stringLen; $i++) {
            $char = $string[$i];
            if ($char === $currentChar) {
                $num ++;

                if ($i < $stringLen - 1) {
                    continue;
                }
            }

            $result .= $currentChar . $num;
            $num = 1;
            $currentChar = $char;
        }

        return $result;
    }
}

$s = new Solution();
echo $s->compress('AAAAABBBCCCC') === 'A5B3C4';
