<?php 

$x[] = ['a', 'b', 'c', 'd'];
$x[] = ['v', 'w', 'l', 'ç'];
$x[] = ['f', 'g', 'h', 'c'];
$x[] = ['i', 'o', 'z', 'h'];


for($i = 0; $i <= count($x) -1; $i++) {
    echo $x[$i][$i]."\n";
}

echo "\n";

$lines = count($x) - 1;

for($i = 0; $i <= count($x) -1; $i++) {
    echo $x[$i][$lines]."\n";
    $lines--;
}