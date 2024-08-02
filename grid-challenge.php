<?php

// Grid Challenge (Hackerrank)

function isSorted(array $str) {
    $sorted = $str;
    sort($sorted);
    
    return $sorted === $str;    
}

function gridChallenge($grid) {
    $sortedLines = [];
    
    foreach($grid as $lines){
        $lineArray = str_split($lines);
        sort($lineArray);
        $sortedLines[] = $lineArray;
    }
    
    for($i = 0; $i <= count($sortedLines) -1; $i++) {
        $column = array_column($sortedLines, $i);
        
        if(isSorted($column) === false) {
            return 'NO';
        }
    }
    
    return 'YES';
}