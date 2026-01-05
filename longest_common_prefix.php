<?php

class Solution {

    /**
     * @param String[] $strs
     * @return String
     */
    function longestCommonPrefix($strs) {
        $prefix = '';

        if (count($strs) === 1) {
            return $strs[0];
        }

        foreach (str_split($strs[0]) as $i => $char) {
            $prefix .= $char;

            foreach ($strs as $str) {
                if (substr($str, 0, $i+1) !== $prefix) {
                    return substr($prefix, 0, $i);
                }
            }
        }

        return $prefix;
    }
}