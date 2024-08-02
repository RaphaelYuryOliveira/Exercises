<?php

# Waiter (Hackerrank)

function isPrime($num) {
    if ($num < 2) return false;
    if ($num == 2) return true;
    if ($num % 2 == 0) return false;

    $sqrtNum = sqrt($num);
    for ($i = 3; $i <= $sqrtNum; $i += 2) {
        if ($num % $i == 0) return false;
    }
    return true;
}

function waiter($number, $q) {
    $primeNumbers = [];
    $num = 2;

    while (count($primeNumbers) < $q) {
        if (isPrime($num)) {
            $primeNumbers[] = $num;
        }
        $num++;
    }

    $answers = [];
    $a = $number;
    $b = [];
    $m = [];

    for($i = 0; $i < $q; $i++) {
        $prime = array_shift($primeNumbers);
        $b = [];

        $countA = count($a) - 1;
        for($countA; $countA >= 0; $countA--) {
            $result = ($a[$countA]%$prime) === 0;

            if(true === $result) {
               $b[] = $a[$countA];
               continue;
            }
            
            $m[] = $a[$countA];
        }
        $a = $m;
        $m = [];

        $counterB = count($b) - 1;
        for($j = 0; $counterB >= $j; $j++) {
            $answers[] = array_pop($b);
        }
    }

    $counterA = count($a) - 1;
    for($c = 0; $counterA >= $c; $c++) {
        $answers[] = array_pop($a);
    }

    return $answers;
}

//$result = waiter([3, 3, 4, 4, 9], 2);
//$result = waiter([3, 4, 7, 6, 5], 1);
$result = waiter([2, 3, 4, 5, 6, 7], 3);

var_dump($result);