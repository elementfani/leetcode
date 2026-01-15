<?php

class Solution
{
    /**
     * @param int[] $candidates
     * @param int $target
     * @return int[][]
     */
    public function combinationSum(array $candidates, int $target): array {
        $result = [];
        sort($candidates);

        if ($candidates[0] > $target) { return $result; }

        $this->backtrack(0, $target, $candidates, [], $result);
        return $result;
    }

    private function backtrack(int $start, int $target, array $candidates, array $combinations, array &$result): void {
        if ($target < 0) { return; }
        if ($target === 0) {
            $result[] = $combinations;
            return;
        }

        for ($i = $start; $i < count($candidates); $i++) {
            $combinations[] = $candidates[$i];
            $this->backtrack($i, $target - $candidates[$i], $candidates, $combinations, $result);
            array_pop($combinations);
        }
    }
}

$s = new Solution();
$r = $s->combinationSum([2, 3, 6, 7], 7);
print_r($r);