<?php

# Recursive Digit Sum (Hackerrank)

function superDigit($n, $k) {
    $numbers = str_split($n);
    
    $sum = array_sum($numbers);
    $finalNumber = $sum * $k;
    
    $arrNumber = str_split($finalNumber);
     
     while(count($arrNumber) !== 1) {
        $sum = array_sum($arrNumber);
        $arrNumber = str_split($sum);
     }
     
     return $arrNumber[0];
 }