<?php

class Trie {
    private array $wordsIndex = [];
    private array $searchIndex = [];

    function __construct() {

    }

    function insert(string $word): null {
        if (isset($this->wordsIndex[$word])) {
            return null;
        }
        $wordIndex = count($this->wordsIndex) + 1;
        $this->wordsIndex[$word] = $wordIndex;

        $key = '';

        foreach (str_split($word) as $char) {
            $key .= $char;

            if (!isset($this->searchIndex[$key])) {
                $this->searchIndex[$key] = [];
            }

            $this->searchIndex[$key][] = $wordIndex;
        }

        return null;
    }

    function search(string $word): bool {
        return isset($this->wordsIndex[$word]);
    }

    function startsWith(string $prefix): bool {
        return isset($this->searchIndex[$prefix]);
    }
}

$obj = new Trie();
echo $obj->insert('apple') === null ? "true\n" : "false\n";
echo $obj->search('apple') === true ? "true\n" : "false\n";
echo $obj->search('app') === false ? "true\n" : "false\n";
echo $obj->startsWith('app') === true ? "true\n" : "false\n";
echo $obj->insert('app') === null ? "true\n" : "false\n";
echo $obj->search('app') === true ? "true\n" : "false\n";

$obj = new Trie();
echo $obj->startsWith('a') === false ? "true\n" : "false\n";
