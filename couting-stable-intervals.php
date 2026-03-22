<?php

# Counting Stable Performance Intervals (Hackerrank)
/*
 * The function is expected to return a LONG_INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER n
 *  2. INTEGER_ARRAY a
 *  3. INTEGER k
 */

function countValidSubarrays($n, $a, $k) {
    $maxList = new SplDoublyLinkedList();
    $minList = new SplDoublyLinkedList();
    $response = 0;
    $left = 0;

    for ($right = 0; $right < $n; $right++) {
        while($maxList->isEmpty() === false && $a[$maxList->top()] <= $a[$right]) {
            $maxList->pop();
        }
        $maxList->push($right);

        while($minList->isEmpty() === false && $a[$minList->top()] >= $a[$right]) {
            $minList->pop();
        }
        $minList->push($right);

        while (
            $maxList->isEmpty() === false
            && $minList->isEmpty() === false
            && $a[$maxList->bottom()] - $a[$minList->bottom()] > $k
        ) {
            if ($maxList->bottom() === $left) {
                $maxList->shift();
            }

            if ($minList->bottom() === $left) {
                $minList->shift();
            }

            $left++;
        }

        $response = $response + ($right - $left + 1);
    }

    echo $response;
}

countValidSubarrays(5, [1, 2, 3, 2, 4], 3);