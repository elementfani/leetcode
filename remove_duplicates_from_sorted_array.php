<?php

final readonly class Solution
{
    public function removeDuplicates(array &$nums): int {
        $uniq = array_values(array_unique($nums));

        foreach ($nums as $i => $num) {
            $nums[$i] = $uniq[$i] ?? '_';
        }

        return count($uniq);
    }
}

$s = new Solution();
$nums = [1,1,2];
$k = $s->removeDuplicates($nums);
echo 2 === $k && $nums === [1,2,'_'] ? "true\n" : "false\n";
