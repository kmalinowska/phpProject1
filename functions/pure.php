<?php

function add(int $a, int $b): int {
 return $a + $b;
}

var_dump(add(1,3), add(1,3));
/*output: exactly the same results!! 
int(4)
int(4)
*/

$total = 0;
function addtoTotal($value) {
    global $total;
    $total += $value;
    return $total;
}

var_dump(addToTotal(3), addToTotal(3));
//global state is modified!!!!
/*output: different results with the same argument value!!!
int(3)
int(6)
*/