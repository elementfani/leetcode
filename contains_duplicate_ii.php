<?php

final readonly class Solution
{
    public function containsNearbyDuplicate(array $nums, int $k): bool {
        if (0 === $k) {
            return false;
        }

        $map = [];
        foreach ($nums as $i => $num) {
            if (array_key_exists($num, $map)) {
                $prevIndex = $map[$num] ?? null;
                $diff = $i - $prevIndex;
                if ($diff <= $k) {
                    return true;
                }
            }

            $map[$num] = $i;
        }

        return false;
    }
}

$s = new Solution();

echo $s->containsNearbyDuplicate([0,1,2,3,2,5], 3) === true ? "true\n" : "false\n";
echo $s->containsNearbyDuplicate([1,2,1], 0) === false ? "true\n" : "false\n";
echo $s->containsNearbyDuplicate([1,2,3,1], 3) === true ? "true\n" : "false\n";
echo $s->containsNearbyDuplicate([1,2,3,1,2], 3) === true ? "true\n" : "false\n";
echo $s->containsNearbyDuplicate([1,0,1,1], 1) === true ? "true\n" : "false\n";
echo $s->containsNearbyDuplicate([1,2,3,1,2,3], 2) === false ? "true\n" : "false\n";

