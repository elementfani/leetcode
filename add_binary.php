<?php

final class Solution
{
    function addBinary(string $a, string $b) {
        $aArray = str_split($a);
        $bArray = str_split($b);

        if (count($aArray) < count($bArray)) {
            $long = $bArray;
            $short = $aArray;
        } else {
            $long = $aArray;
            $short = $bArray;
        }

        $result = [];
        $extraBit = 0;

        foreach (array_reverse($long) as $lBit) {
            $sBit = array_pop($short) ?? 0;

            $sum = $lBit + $sBit + $extraBit;
            if ($sum === 3) {
                $sum = 1;
                $extraBit = 1;
            } elseif ($sum === 2) {
                $sum = 0;
                $extraBit = 1;
            } else {
                $extraBit = 0;
            }
            $result[] = $sum;
        }

        if ($extraBit === 1) {
            $result[] = 1;
        }

        $result = array_reverse($result);
        return implode('', $result);
    }
}

$s = new Solution();

echo $s->addBinary('11', '1') === '100' ? "true\n" : "false\n";
echo $s->addBinary('111', '11') === '1010' ? "true\n" : "false\n";
echo $s->addBinary('1010', '1011') === '10101' ? "true\n" : "false\n";
