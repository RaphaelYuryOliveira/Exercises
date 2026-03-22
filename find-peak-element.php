<?php 

#Find Peak Element in Bitonic Array (Hackerrank)

function findPeakIndex($counts) {
    $min = 0;
    $total = count($counts);
    $max = $total - 1;
 
    while ($min <= $max) {
        $mid = intdiv(($max + $min), 2);
        
        if (
            isset($counts[$mid + 1]) === false 
            || isset($counts[$mid - 1]) === false 
            || ($counts[$mid] > $counts[$mid + 1] && $counts[$mid] > $counts[$mid - 1])) 
        {
            return $mid;
        }
        
        if ($counts[$mid] < $counts[$mid + 1]) {
            $min = $mid + 1;
            continue;
        }
        
        $max = $mid -1;
    }
    
    return -1;
}

var_dump(findPeakIndex([3, 2, 0]));