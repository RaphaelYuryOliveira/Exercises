<?php

# The Bomberman Game (Hackerrank)

function getStateAfterExplosion($grid, $empty, $totalL, $totalC) {
    $totalC--;
    $totalL--;
    foreach ($grid as $lineKey => $column) {
        if (is_string($column)) {
            $column = str_split($column);
        }
    
        foreach ($column as $columnKey => $columnElement) {
            if ($columnElement === '.') {
                continue;
            }

            $empty[$lineKey][$columnKey] = '.';
            
            if ($columnKey !== 0) {
                $empty[$lineKey][$columnKey - 1] = '.';
            }

            if ($columnKey < $totalC) {
                $empty[$lineKey][$columnKey + 1] = '.';
            }

            if ($lineKey !== 0) {
                $empty[$lineKey - 1][$columnKey] = '.';
            }

            if ($lineKey < $totalL) {
                $empty[$lineKey + 1][$columnKey] = '.';
            }
        }
    }
 
    return $empty;
}

function getResponse($grid) {
    $response = [];

    foreach ($grid as $a) {
        $response[] = implode('', $a);
    }

    return $response;
}

function fillBombsInEmptySpaces($lines, $elements) {
    $arr = array_fill(0, $lines, array_fill(0, $elements, 'O'));
    return $arr;
}

function bomberMan($n, $grid) {
    if ($n === 1) {
        return $grid;
    }
    $totalL = count($grid);
    $totalC = strlen($grid[0]);
    $empty = fillBombsInEmptySpaces($totalL, $totalC);

    $x = $n%2;

    if ($x === 0) {
        return getResponse($empty);
    }

    $firstGrid = getStateAfterExplosion($grid, $empty, $totalL, $totalC);

    if ($n === 3) {
        return getResponse($firstGrid);
    }

    $secondGrid = getStateAfterExplosion($firstGrid, $empty, $totalL, $totalC);

    if ($n%4 === 1) {
        return getResponse($secondGrid);
    }

    $thirdGrid = getStateAfterExplosion($secondGrid, $empty, $totalL, $totalC);

    return getResponse($thirdGrid);
}


$arr[] = '.......';
$arr[] = '...O.O.';
$arr[] = '....O..';
$arr[] = '..O....';
$arr[] = 'OO...OO';
$arr[] = 'OO.O...';


$result = bomberMan(11, $arr);

foreach($result as $a) {
    echo "$a\n";
}