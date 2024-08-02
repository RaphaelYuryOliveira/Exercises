<?php

# Simple Text Editor (Hackerrank)

function make(array $operation, array $str): array {   
    if($operation[0] == '1') {
        $str = array_merge($str, str_split(trim($operation[1])));
        return $str;
    }
    
    if($operation[0] == '2') {
        $itensToRemove = (int)$operation[1];
        $str = array_slice($str, 0, -$itensToRemove);
        return $str;
    }
    
    if($operation[0] == '3') {
        $character = (int)$operation[1] - 1;
        
        if (false === isset($str[$character])) {
            return $str;
        }
        
        echo $str[$character]."\n";
        return $str;
    }
    
    return $str;
}