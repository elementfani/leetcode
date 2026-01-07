<?php

class Solution
{
    function insert(array $intervals, array $newInterval): array
    {
        $i = 0;
        $n = count($intervals);
        $result = [];

        // before
        while ($i < $n && $intervals[$i][1] < $newInterval[0]) {
            $result[] = $intervals[$i];
            $i ++;
        }

        // merge
        $mergedInterval = $newInterval;
        while ($i < count($intervals)) {
            $interval = $intervals[$i];

            if ($newInterval[1] < $interval[0]) {
                break;
            }

            $mergedInterval[0] = min($interval[0], $mergedInterval[0]);
            $mergedInterval[1] = max($interval[1], $mergedInterval[1]);
            $i ++;
        }
        $result[] = $mergedInterval;

        // after
        for ($j = $i; $j < count($intervals); $j++) {
            $result[] = $intervals[$j];
        }

        return $result;
    }
}

$s = new Solution();

echo $s->insert([[1, 5]], [0, 3]) === [[0, 5]] ? "true\n" : "false\n";
echo $s->insert([[1, 5]], [6, 8]) === [[1, 5], [6, 8]] ? "true\n" : "false\n";
echo $s->insert([[1, 5]], [2, 7]) === [[1, 7]] ? "true\n" : "false\n";
echo $s->insert([[1, 3], [6, 9]], [2, 5]) === [[1, 5], [6, 9]] ? "true\n" : "false\n";
echo $s->insert([[1, 5]], [2, 3]) === [[1, 5]] ? "true\n" : "false\n";
echo $s->insert([[1, 3], [6, 9]], [2, 5]) === [[1, 5], [6, 9]] ? "true\n" : "false\n";
echo $s->insert([[1, 2], [3, 5], [6, 7], [8, 10], [12, 16]], [4, 8]) === [[1, 2], [3, 10], [12, 16]] ? "true\n" : "false\n";

