<?php

//pass by value - default, create a copy of value
function doubleValue(int $number):int {
    $number *= 2;
    return $number;
}

$original = 5;
doubleValue($original);
var_dump($original);

//pass by reference - dont use without any reason, change original value outside the function
function doubleValue2(int &$number):int {
    $number *= 2;
    return $number;
}

$original = 5;
doubleValue2($original);
var_dump($original);