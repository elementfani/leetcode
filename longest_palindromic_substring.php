<?php

final readonly class Solution
{
    public function longestPalindrome($s) {
        $n = strlen($s);
        if ($n <= 1) {
            return $s;
        }

        $longestPalindromic = $s[0];
        $longestPalindromicLen = 1;

        for ($i = 0; $i < $n; $i++) {
            $palindromicOdd = $this->getPalindromic($s, $i - 1, $i + 1);
            $palindromicEven = $this->getPalindromic($s, $i, $i + 1);

            if ($longestPalindromicLen < strlen($palindromicOdd)) {
                $longestPalindromic = $palindromicOdd;
                $longestPalindromicLen = strlen($palindromicOdd);
            }

            if ($longestPalindromicLen < strlen($palindromicEven)) {
                $longestPalindromic = $palindromicEven;
                $longestPalindromicLen = strlen($palindromicEven);
            }
        }

        return $longestPalindromic;
    }

    public function getPalindromic(string $s, int $left, int $right): string
    {
        $sLen = strlen($s);
        $maxRight = $sLen - 1;
        $palindromic = '';

        while (true) {
            if ($left < 0) {
                return $palindromic;
            }

            if ($maxRight < $right) {
                return $palindromic;
            }

            $fromChar = $s[$left];
            $toChar = $s[$right];

            if ($fromChar !== $toChar) {
                return $palindromic;
            }

            $len = $right - $left + 1;
            $palindromic = substr($s, $left, $len);

            $left --;
            $right ++;
        }
    }
}

$s = new Solution();

echo $s->longestPalindrome('babad') === 'bab' ? "true\n" : "false\n";
echo $s->longestPalindrome('abbc') === 'bb' ? "true\n" : "false\n";
echo $s->longestPalindrome('ac') === 'a' ? "true\n" : "false\n";
echo $s->longestPalindrome('abbcccba') === 'bcccb' ? "true\n" : "false\n";

