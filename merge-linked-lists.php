<?php

# Merge two sorted linked lists (Hackerrank)

function sortList($rawList) {
    $firstListLenght = $rawList[0];

    $firstList = array_slice($rawList, 1, $firstListLenght);

    $secondListLenght = $rawList[$firstListLenght + 1];

    $secondList = array_slice($rawList, $firstListLenght + 2, $secondListLenght);

    $newList = array_merge($firstList,$secondList);
    sort($newList);

    echo implode(' ', $newList)."\n"; 
    
    $newIndex = ($firstListLenght + 1) + ($secondListLenght + 1);
    
    if(true === isset($rawList[$newIndex])) {
        $newListnew = array_slice($rawList, $newIndex);
        sortList($newListnew);
        return;
    }
}