<?php

# Caesar Cipher (Hackerrank)

function caesarCipher($s, $k) {
    $alphabet = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l','m','n', 'o', 'p', 'q','r','s','t','u','v','w','x','y','z'];
    $string = str_split($s);
    $final = '';

    foreach($string as $key => $char) {
        $r = 0;
        $shouldUpper = false;

        if (ctype_upper($char)) {
            $char = strtolower($char);
            $shouldUpper = true;
        }

        $findKey = array_search($char, $alphabet);
        
        if (false === $findKey) {
            $final = $final.$char;
            continue;
        }
        
        $big = $findKey + $k;
        $h = (int)($big / 26);

        if ($h > 1) {
          $i = 26 * $h;
          $findKey = $big - $i; 
          
            $addStr = $alphabet[$findKey];
        
            if ($shouldUpper === true) {
                $addStr = strtoupper($addStr);
            }
        
            $final = $final.$addStr;
            continue;
        }

        if ($findKey === 25) {
            $r = $k - 1;
            $addStr = $alphabet[$r];    
            
            if ($shouldUpper === true) {
                $addStr = strtoupper($addStr);
            }
            
            $final = $final.$addStr;
            continue;
        }
        
        $r = $findKey + $k;
        
        if ($r > 25) {
            $r = $r - 25;
            $r--;
        }
        

        
        $addStr = $alphabet[$r];
        
        if ($shouldUpper === true) {
            $addStr = strtoupper($addStr);
        }
        
        $final = $final.$addStr;
    }
    
    $a = str_replace(' ', '', $final);
    
    return "$a\n";
}