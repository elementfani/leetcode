<?php

final class Solution
{
    function containsDuplicate(array $nums): bool {
        $numsUniq = array_unique($nums);
        return count($numsUniq) !== count($nums);
    }
}

$s = new Solution();

echo $s->containsDuplicate([1, 2, 3, 1]) ? "true\n" : "false\n";
