<?php
declare(strict_types=1);
// php 5 - types
// php 7 - strict types
function add(int $a, int $b): int {
    return $a + $b;
}

echo add(5,3) . "\n";
// var_dump(add("5", 3)); - wrong, fatal error
var_dump(add((int)5.0, 3)); // ok, using typecast float to int