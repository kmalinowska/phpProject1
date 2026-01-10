<?php

// funkcja obliczająca silnię
function factorial(int $n): int {
    echo "$n\n";
    if ($n === 0 || $n === 1) {
        return 1;
    }
    return $n * factorial($n-1);
}

var_dump(factorial(5));
/*
output:
5
4
3
2
1
int(120)
*/