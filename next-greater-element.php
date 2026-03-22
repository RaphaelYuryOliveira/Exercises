<?php

function findNextGreaterElementsWithDistance($readings) {
    $response = [];
    
    $right = 0;
    for($left = 0; $left < count($readings); $left++) {
        $right = $left + 1;
        
        while (isset($readings[$right]) && $readings[$left] >= $readings[$right]) {
            $right++;
        }

        if (isset($readings[$right]) == false || $readings[$left] >= $readings[$right]) {
            $response[] = [-1, -1];
            continue;
        }
 
        $number = $readings[$right];
        $distance = $right - $left;
        $response[] = [$number, $distance];
    }
    
    return $response;
}

var_dump(findNextGreaterElementsWithDistance([2, 1, 2, 4, 3]));