<?php

# Balanced Brackets (Hackerrank)

function isBalanced($s) {
    $elements = ['(', '[', '{'];
    $string = str_split($s);
    $rightQ = [];
    $rightCount = 0;
    $leftCount = 0;

    foreach($string as $element) {
        if(true === in_array($element, $elements)) {
            $rightCount++;
            $rightQ[] = $element;
            continue;
        }

        $lastElement = end($rightQ);
        $lastElementKey = array_key_last($rightQ);
        
        if($element === ')' && $lastElement === '(') {
            $leftCount++;
            unset($rightQ[$lastElementKey]);
            continue;
        }
        if($element === ']' && $lastElement === '[') {
            $leftCount++;
            unset($rightQ[$lastElementKey]);
            continue;
        }
        if($element === '}' && $lastElement === '{') {
            $leftCount++;
            unset($rightQ[$lastElementKey]);
            continue;
        }
        
        return 'NO';
    }
    
    if($rightCount !== $leftCount) {
        return 'NO';
    }
    
    return 'YES';
}