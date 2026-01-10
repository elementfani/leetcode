<?php

class Solution
{
    function threeSum(array $nums): array
    {
        if (count($nums) < 3) {
            return [];
        }

        $result = [];
        $iteration = 0;

        $pointerA = 0;
        $pointerB = 1;
        $pointerC = 2;

        $lastPointerA = count($nums) - 3;
        $lastPointerB = count($nums) - 2;
        $lastPointerC = count($nums) - 1;

        while (true) {
            $iteration ++;

            $a = $nums[$pointerA];
            $b = $nums[$pointerB];
            $c = $nums[$pointerC];

            $parts = [$a, $b, $c];
            if (0 === array_sum($parts)) {
                sort($parts);
                $resultKey = implode('_', $parts);
                $result[$resultKey] = $parts;
            }

            if (
                $pointerA === $lastPointerA
                && $pointerB === $lastPointerB
                && $pointerC === $lastPointerC
            ) {
                break;
            }

            if ($pointerB === $lastPointerB) {
                $pointerA ++;
                $pointerB = $pointerA + 1;
                $pointerC = $pointerB + 1;
                continue;
            }

            if ($pointerC === $lastPointerC) {
                $pointerB ++;
                $pointerC = $pointerB + 1;
                continue;
            }

            $pointerC ++;
        }

        return array_values($result);
    }
}

$s = new Solution();

echo $s->threeSum([-1, 0, 1, 2, -1, -4]) === [[-1, 0, 1], [-1, -1, 2]] ? "true\n" : "false\n";
echo $s->threeSum([-1, 0, 1, 2, -1, -4]) === [[-1, 0, 1], [-1, -1, 2]] ? "true\n" : "false\n";
