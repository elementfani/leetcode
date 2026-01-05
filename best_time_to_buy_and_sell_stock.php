<?php

final readonly class Solution
{
    public function maxProfit(array $prices): int  {
        $minPrice = null;
        $maxRevenue = 0;

        foreach ($prices as $price) {
            if (null === $minPrice || $price < $minPrice) {
                $minPrice = $price;
                continue;
            }

            $revenue = $price - $minPrice;
            if ($maxRevenue < $revenue) {
                $maxRevenue = $revenue;
            }
        }

        return $maxRevenue;
    }
}

$s = new Solution();

echo $s->maxProfit([7,1,5,3,6,4]) === 5 ? "true\n" : "false\n";
echo $s->maxProfit([7,6,4,3,1]) === 0 ? "true\n" : "false\n";

