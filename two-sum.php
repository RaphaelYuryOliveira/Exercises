<?php

function findTaskPairForSlot($taskDurations, $slotLength) {
    $response = [];
    $numberToCompleteSum = [];
    
    for ($i = 0; $i < count($taskDurations); $i++) {
        $currentNumber = $taskDurations[$i];
        if (isset($numberToCompleteSum[$currentNumber])) {
            $response = [$numberToCompleteSum[$currentNumber], $i];
            return $response;
        }
        
        $numberToFind = $slotLength - $currentNumber;
        
        $numberToCompleteSum[$numberToFind] = $i;
    }
    
    if (empty($response) === true) {
        return [-1, -1];
    }
    
    return $response;
}


var_dump(findTaskPairForSlot([2, 7, 11, 15, 2], 9));