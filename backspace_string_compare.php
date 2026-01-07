<?php

class Solution
{
    function backspaceCompare(string $s, string $t): bool {
        $sCleaned = $this->cleanString($s);
        $tCleaned = $this->cleanString($t);

        return $sCleaned === $tCleaned;
    }

    private function cleanString(string $s): string
    {
        $cleanedS = '';
        $skipChars = 0;

        foreach (array_reverse(str_split($s)) as $i => $char) {
            if ($char == '#') {
                $skipChars ++;
                continue;
            }

            if (0 < $skipChars) {
                $skipChars --;
                continue;
            }

            $cleanedS .= $char;
        }

        return $cleanedS;
    }
}

$s = new Solution();
echo $s->backspaceCompare('ab#c', 'ad#c') ? "true\n" : "false\n";
echo $s->backspaceCompare('ab##', 'c#d#') ? "true\n" : "false\n";
echo $s->backspaceCompare('xywrrmp', 'xywrrmu#p') ? "true\n" : "false\n";

