<?php

#Merge and Sort Intervals Hackerhank

function mergeHighDefinitionIntervals($intervals) {
    if (empty($intervals) === true) {
        return [];
    }
    
    usort($intervals, function ($a, $b) {
        return $a[0] <=> $b[0];
    });
        
    $response[] = $intervals[0];

    for ($i = 1; $i < count($intervals); $i++) {
        $lastMergeIndex = count($response) - 1;
        $lastElement = $response[$lastMergeIndex];

        if ($lastElement[1] >= $intervals[$i][0]) {
            $response[$lastMergeIndex][1] = max(
                $response[$lastMergeIndex][1],
                $intervals[$i][1]
            );
            continue;
        }
        
        if ($lastElement[1] < $intervals[$i][0]) {
            $response[] = $intervals[$i];
        }
    }
    
    return $response;
}


var_dump(mergeHighDefinitionIntervals([[15, 18], [1, 3], [2, 6], [8, 10]]));