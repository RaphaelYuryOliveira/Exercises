<?php

#Jesse and Cookies (Hackerrank)

function cookies($k, $A)
{
    $queue = new SplMinHeap();

    foreach ($A as $value) {
        $queue->insert($value);
    }

    $count = 0;
    while ($queue->top() < $k) {
        if ($queue->count() < 2) {
            $count = -1;
            break;
        }

        $newValue = $queue->extract()+(2*$queue->extract());
        $queue->insert($newValue);
        $count++;
    }

    var_dump($queue->count());
    echo("\n");

    return $count;
}


cookies(90, [13,47,74,12,89,74,18,38]);