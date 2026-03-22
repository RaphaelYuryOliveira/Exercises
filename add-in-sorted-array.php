<?php

function addInSortedArray(array $array, int $number): array
{
    $total = count($array);
    $min = 0;
    $max = $total - 1;

    while ($min <= $max) {
        $mid = intdiv($max + $min, 2);

        if ($number > $array[$mid]) {
            $min = $mid + 1;
            continue;
        }

        $max = $mid - 1;
    }

    array_splice($array, $min, 0, $number);

    return $array;
}


$result = addInSortedArray([1, 3, 44, 55], 56);

foreach($result as $r){ 
    echo "$r\n";
}

