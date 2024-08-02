<?php

#Sherlock and the Valid String (Hackerrank)

function isValid($s) {
    $arr = str_split($s);
    $occurrences = [];

    foreach($arr as $char) {
        if(array_key_exists($char, $occurrences)) {
            $occurrences[$char] = $occurrences[$char] + 1;

            continue;
        }
        
        $occurrences[$char] = 1;
    }

    $max = max($occurrences);
    $min = min($occurrences);


    if($max === $min) {
        return "YES\n";
    }

    $maxKey = array_search($max, $occurrences);

    $occurrences[$maxKey]--;
    $max = max($occurrences);


    if($max === $min) {
        return "YES\n";
    }

    $occurrences[$maxKey]++;

    $max = max($occurrences);
    $minKey = array_search($min, $occurrences);

    if($occurrences[$minKey] === 1) {
        unset($occurrences[$minKey]);
    }

    $min = min($occurrences);

    if($max === $min) {
        return "YES\n";
    }

    return "NO\n";
}

echo isValid('aaacccb');