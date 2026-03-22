<?php

#Fail
function getWindowMedian(array $window, int $total): float {
    $division = $total % 2;

    if ($division === 0) {
        $firstElement = $total / 2;
        $secondElement = ($total / 2) - 1;
        
        return ($window[$firstElement] + $window[$secondElement]) / 2;
    }

    $medianElement = $total / 2;
    return $window[$medianElement];
}

function addToWindow(array $window, int $value, int $total): array {
    $min = 0;
    $max = $total - 2;

    while($min <= $max) {
        $mid = intdiv($max + $min, 2);
        
        if ($value === $window[$mid]) {
            $min = $mid;
            break;
        }
        
        if ($value > $window[$mid]) {
            $min = $mid + 1;
            continue;
        }
        
        $max = $mid - 1;
    }
    
    array_splice($window, $min, 0, $value);
    
    return $window;
}

function removeFromWindow(array $window, $value, int $total): array {
    $min = 0;
    $max = $total - 1;
    $indexToDelete = null;

    while ($min <= $max) {
        $mid = intdiv($max + $min, 2);
        
        if ($value === $window[$mid]) {
            $indexToDelete = $mid;
            break;
        }
        
        if ($value > $window[$mid]) {
            $min = $mid + 1;
            continue;
        }
        
        $max = $mid - 1;
    }

    unset($window[$indexToDelete]);
    return array_values($window);
}

function activityNotifications($expenditure, $d) {
    $response = 0;
    $total = count($expenditure);
    
    if ($total === 0 || $total <= $d) {
        return $response;
    }
    
    $window = array_slice($expenditure, 0, $d);
    $originalWindow = $window;
    sort($window);

    $left = 0;
    for ($right = $d; $right < $total; $right++) {
        $median = getWindowMedian($window, $d);
        $maxExpediture = $median * 2;

        if ($expenditure[$right] >= $maxExpediture) {
            $response++;
        }
        
        $valueToRemove = $originalWindow[$left];
        $window = removeFromWindow($window, $valueToRemove, $d);
        $window = addToWindow($window, $expenditure[$right], $d);
        $originalWindow[] = $expenditure[$right];
        unset($originalWindow[$left]);
        $left++;
    }
    
    return $response;
}

activityNotifications([2, 3, 4, 2, 3, 6, 8, 4, 5], 5);