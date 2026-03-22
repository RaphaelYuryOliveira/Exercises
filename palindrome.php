<?php

#Highest value palindrome (Hackerrank)

function highestValuePalindrome($s, $n, $k) {
    $list = str_split($s);
    $min = 0;
    $max = $n - 1;
    $changes = [];
    
    if ($max === 0 && $k >= 1) {
        return '9';
    }

    
    while ($min <= $max) {
        if ($list[$min] !== $list[$max]) {
            if ($k === 0) {
                return '-1';
            }
            
            $maxNumber = max($list[$min], $list[$max]); 
            $k--;
            if ($list[$min] !== $maxNumber) {
                $list[$min] = $maxNumber;
                $changes[$min] = true;
                $changes[$max] = true;
                $min++;
                $max--;
                continue;
            }
            
            $list[$max] = $maxNumber;
            $changes[$min] = true;
            $changes[$max] = true;
            $min++;
            $max--;
            continue;
        }
        
        $min++;
        $max--;
    }
    
    $min = 0;
    $max = $n - 1;
    while ($min <= $max) {        
        if ($k === 0) {
            break;
        }
        
        if ($min === $max) {
            if ($k > 0) {
                $list[$min] = '9';
            }
            break;
        }

        if ($list[$min] === '9' && $list[$max] === '9') {
            $min++;
            $max--;
            continue;
        }        
        
        if (isset($changes[$min]) === true) {
            $list[$min] = '9';
            $list[$max] = '9';
            $k--;
            $min++;
            $max--;
            continue;            
        }
        
        if ($k >= 2) {
            $list[$min] = '9';
            $list[$max] = '9';
            $k = $k - 2;
            $min++;
            $max--;
            continue;
        }
        
        $min++;
        $max--;
    }

    return implode('', $list);
}

var_dump(highestValuePalindrome('3943', 4, 1));