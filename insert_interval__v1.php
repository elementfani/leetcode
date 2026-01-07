<?php

class Solution
{
    function insert(array $intervals, array $newInterval): array
    {
        if ($intervals === []) {
            return [$newInterval];
        }

        $newIntervals = [];
        $mergedIntervalFrom = null;
        $skipInterval = false;

        foreach ($intervals as $i => $interval) {
            if ($interval[0] <= $newInterval[0] && $newInterval[0] <= $interval[1]) {
                $mergedIntervalFrom = $interval[0];
                $skipInterval = true;
            }

            if (null === $mergedIntervalFrom && $newInterval[0] <= $interval[0]) {
                $mergedIntervalFrom = $newInterval[0];
                $skipInterval = true;
            }

            if ($skipInterval) {
                if ($newInterval[1] < $interval[0]) {
                    $newIntervals[] = [$mergedIntervalFrom, $newInterval[1]];
                    $skipInterval = false;
                } elseif ($newInterval[1] < $interval[1]) {
                    $newIntervals[] = [$mergedIntervalFrom, $interval[1]];
                    $skipInterval = false;
                    continue;
                } elseif ($newInterval[1] === $interval[0]) {
                    $newIntervals[] = [$mergedIntervalFrom, $interval[1]];
                    $skipInterval = false;
                    continue;
                } elseif (!isset($intervals[$i+1])) {
                    $newIntervals[] = [$mergedIntervalFrom, $newInterval[1]];
                    break;
                }
            }

            if (!$skipInterval) {
                $newIntervals[] = $interval;
            }
        }

        if (null === $mergedIntervalFrom) {
            $newIntervals[] = $newInterval;
        }

        return $newIntervals;
    }
}

$s = new Solution();

echo $s->insert([[1, 5]], [0, 3]) === [[0, 5]] ? "true\n" : "false\n";
//echo $s->insert([[1, 5]], [6, 8]) === [[1, 5], [6, 8]] ? "true\n" : "false\n";
//echo $s->insert([[1, 5]], [2, 7]) === [[1, 7]] ? "true\n" : "false\n";
//echo $s->insert([[1, 3], [6, 9]], [2, 5]) === [[1, 5], [6, 9]] ? "true\n" : "false\n";
//echo $s->insert([[1, 5]], [2, 3]) === [[1, 5]] ? "true\n" : "false\n";
//echo $s->insert([[1, 3], [6, 9]], [2, 5]) === [[1, 5], [6, 9]] ? "true\n" : "false\n";
//echo $s->insert([[1, 2], [3, 5], [6, 7], [8, 10], [12, 16]], [4, 8]) === [[1, 2], [3, 10], [12, 16]] ? "true\n" : "false\n";

