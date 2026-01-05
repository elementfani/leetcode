<?php

final class Solution
{
    function canConstruct(string $ransomNote, string $magazine) {
        $magazineHash = [];
        foreach (str_split($magazine) as $char) {
            if (!isset($magazineHash[$char])) {
                $magazineHash[$char] = 0;
            }
            $magazineHash[$char] ++;
        }

        foreach (str_split($ransomNote) as $char) {
            if (!isset($magazineHash[$char]) || $magazineHash[$char] <= 0) {
                return false;
            }

            $magazineHash[$char] --;
        }

        return true;
    }
}

$s = new Solution();

echo !$s->canConstruct('aa', 'ab') ? "true\n" : "false\n";
echo $s->canConstruct('aa', 'aab') ? "true\n" : "false\n";
echo $s->canConstruct('bg', 'efjbdfbdgfjhhaiigfhbaejahgfbbgbjagbddfgdiaigdadhcfcj') ? "true\n" : "false\n";
