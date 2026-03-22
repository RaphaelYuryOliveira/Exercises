<?php

# Max Unique Substring Length in a Session (Hackerrank)

function maxDistinctSubstringLengthInSessions($sessionString) {
    if ($sessionString === '*') {
        return 0;
    }
    
    $strArr = str_split($sessionString);
    $set = [];
    $maxLength = 0;
    $length = 0;

    for($right = 0; $right < count($strArr); $right++) {
        $char = $strArr[$right];
        
        if ($char === '*') {
            $set = [];
            continue;
        }

        while (isset($set[$char]) === true) {
            array_shift($set);
        }
        
        $set[$char] = true;
        $length = count($set);
        $maxLength = max($maxLength, $length);
    }
    
    return $maxLength;
}

var_dump(maxDistinctSubstringLengthInSessions('abc*aaiocp**adgcaetool'));
