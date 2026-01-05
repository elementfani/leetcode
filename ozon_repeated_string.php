<?php

/**
 * Дана закодированная строка следующего формата:k[encoded_text]
 * Здесь k это число повторений строки encoded_text.
 *
 * Строка гарантированно имеет корректный формат: нет лишних пробелов, скобки всегда правильные и тд.
 *
 * Необходимо декодировать строку
 *
 * Пример:
 * Input:  "3[a]2[bc]"
 * Output: "aaabcbc"
 *
 * Input:  "3[a2[c]]"
 * Output: "accaccacc"
 *
 * Input:  "2[abc]3[cd]ef"
 * Output: "abcabccdcdcdef"
 */

final readonly class Solution
{
    function decode(string $s): string {
        $resultStr = '';
        $stack = [];
        $stackIndex = 0;
        $stackNum = 0;
        $stackStr = '';

        foreach (str_split($s) as $i => $char) {
            if (is_numeric($char)) {
                $stackNum = (int) $char;
            } elseif ('[' === $char) {
                $stackIndex ++;
                $stack[$stackIndex] = ['num' => $stackNum, 'str' => $stackStr];
            } elseif (']' === $char) {
                $lastStackElement = array_pop($stack);
                $subString = str_repeat($lastStackElement['str'], $lastStackElement['num']);
                if (isset($stack[$stackIndex - 1])) {
                    $stack[$stackIndex - 1]['str'] .= $subString;
                } else {
                    $resultStr .= $subString;
                }
            } elseif (count($stack) > 0) {
                $stack[$stackIndex]['str'] .= $char;
            } else {
                $resultStr .= $char;
            }
        }

        return $resultStr;
    }
}


$t = new Solution();

echo $t->decode('2[bc]') === 'bcbc' ? "true\n" : "false\n";
echo $t->decode('3[a]2[bc]') === 'aaabcbc' ? "true\n" : "false\n";
echo $t->decode('3[ab2[cd]]') === 'abcdcdabcdcdabcdcd' ? "true\n" : "false\n";
echo $t->decode('2[abc]3[cd]ef') === 'abcabccdcdcdef' ? "true\n" : "false\n";