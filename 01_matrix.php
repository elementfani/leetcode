<?php

class Solution
{
    /**
     * @param int[][] $mat
     * @return int[][]
     */
    function updateMatrix(array $mat): array {
        $processedCells = [];

        foreach ($mat as $r => $row) {
            foreach ($row as $c => $cell) {
                if (0 === $cell) {
                    $processedCells[] = [$r, $c];
                } else {
                    $mat[$r][$c] = -1;
                }
            }
        }

        //              top     bottom  left     right
        $directions = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        while (count($processedCells) > 0) {
            [$r, $c] = array_shift($processedCells);

            foreach ($directions as $direction) {
                $rNew = $r + $direction[0];
                $cNew = $c + $direction[1];

                if (!isset($mat[$rNew][$cNew])) {
                    continue;
                }

                if ($mat[$rNew][$cNew] !== -1) {
                    continue;
                }

                $mat[$rNew][$cNew] = $mat[$r][$c] + 1;
                $processedCells[] = [$rNew, $cNew];
            }
        }

        return $mat;
    }
}

$s = new Solution();

echo $s->updateMatrix([
    [0, 0, 0],
    [0, 1, 0],
    [0, 0, 0]
]) === [
    [0, 0, 0],
    [0, 1, 0],
    [0, 0, 0]
] ? "true\n" : "false\n";

$result = $s->updateMatrix([
    [0, 0, 0],
    [0, 1, 0],
    [1, 1, 1]
]);
echo $result === [
    [0, 0, 0],
    [0, 1, 0],
    [1, 2, 1]
] ? "true\n" : "false\n";

$result = $s->updateMatrix([
    [0, 0, 1, 0, 1, 1, 1, 0, 1, 1],
    [1, 1, 1, 1, 0, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 1, 0, 0, 0, 1, 1],
    [1, 0, 1, 0, 1, 1, 1, 0, 1, 1],
    [0, 0, 1, 1, 1, 0, 1, 1, 1, 1],
    [1, 0, 1, 1, 1, 1, 1, 1, 1, 1],
    [1, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [0, 1, 0, 0, 0, 1, 0, 0, 1, 1],
    [1, 1, 1, 0, 1, 1, 0, 1, 0, 1],
    [1, 0, 1, 1, 1, 0, 1, 1, 1, 0]
]);
echo $result === [
    [0, 0, 1, 0, 1, 2, 1, 0, 1, 2],
    [1, 1, 2, 1, 0, 1, 1, 1, 2, 3],
    [2, 1, 2, 1, 1, 0, 0, 0, 1, 2],
    [1, 0, 1, 0, 1, 1, 1, 0, 1, 2],
    [0, 0, 1, 1, 1, 0, 1, 1, 2, 3],
    [1, 0, 1, 2, 1, 1, 1, 2, 1, 2],
    [1, 1, 1, 1, 0, 1, 0, 1, 0, 1],
    [0, 1, 0, 0, 0, 1, 0, 0, 1, 2],
    [1, 1, 1, 0, 1, 1, 0, 1, 0, 1],
    [1, 0, 1, 1, 1, 0, 1, 2, 1, 0]
] ? "true\n" : "false\n";

$result = $s->updateMatrix([
    [1, 1, 0, 0, 1, 0, 0, 1, 1, 0],
    [1, 0, 0, 1, 0, 1, 1, 1, 1, 1],
    [1, 1, 1, 0, 0, 1, 1, 1, 1, 0],
    [0, 1, 1, 1, 0, 1, 1, 1, 1, 1],
    [0, 0, 1, 1, 1, 1, 1, 1, 1, 0],
    [1, 1, 1, 1, 1, 1, 0, 1, 1, 1],
    [0, 1, 1, 1, 1, 1, 1, 0, 0, 1],
    [1, 1, 1, 1, 1, 0, 0, 1, 1, 1],
    [0, 1, 0, 1, 1, 0, 1, 1, 1, 1],
    [1, 1, 1, 0, 1, 0, 1, 1, 1, 1]
]);
$expected = [
    [2, 1, 0, 0, 1, 0, 0, 1, 1, 0],
    [1, 0, 0, 1, 0, 1, 1, 2, 2, 1],
    [1, 1, 1, 0, 0, 1, 2, 2, 1, 0],
    [0, 1, 2, 1, 0, 1, 2, 3, 2, 1],
    [0, 0, 1, 2, 1, 2, 1, 2, 1, 0],
    [1, 1, 2, 3, 2, 1, 0, 1, 1, 1],
    [0, 1, 2, 3, 2, 1, 1, 0, 0, 1],
    [1, 2, 1, 2, 1, 0, 0, 1, 1, 2],
    [0, 1, 0, 1, 1, 0, 1, 2, 2, 3],
    [1, 2, 1, 0, 1, 0, 1, 2, 3, 4]
];
foreach ($result as $i => $row) {
    //echo implode(" ", $row), "\n";
    foreach ($row as $j => $cell) {
        $expectedCell = $expected[$i][$j];
        if ($cell !== $expectedCell) {
            $a = 1;
        }
    }
}
echo $result === $expected ? "true\n" : "false\n";
