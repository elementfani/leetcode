<?php

final readonly class Solution
{
    public function merge(array $intervals): array  {
        usort($intervals, function ($a, $b) {
            return $a[0] <=> $b[0];
        });

        $result = [];
        $lastResultIndex = 0;

        foreach ($intervals as $interval) {
            if (!isset($result[$lastResultIndex])) {
                $result[$lastResultIndex] = $interval;
                continue;
            }

            if ($interval[0] <= $result[$lastResultIndex][1]) {
                $result[$lastResultIndex][1] = max($interval[1], $result[$lastResultIndex][1]);
                continue;
            }

            $lastResultIndex ++;
            $result[$lastResultIndex] = $interval;
        }

        return $result;
    }
}

$s = new Solution();

echo $s->merge([[1,4], [2,3]]) === [[1,4]] ? "true\n" : "false\n";
//echo $s->merge([[1,3], [2,6], [8,10], [15,18]]) === [[1,6], [8,10], [15,18]] ? "true\n" : "false\n";
//echo $s->merge([[1,3], [2,6], [5,7], [9,10], [15,18]]) === [[1,7], [9,10], [15,18]] ? "true\n" : "false\n";
//echo $s->merge([[1,4], [4,5]]) === [[1,5]] ? "true\n" : "false\n";
//echo $s->merge([[4,7], [1,4]]) === [[1,7]] ? "true\n" : "false\n";

