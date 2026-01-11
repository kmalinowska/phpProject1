<?php

$int = 42;
$float = 3.14;

//casting
$stringToInt = (int)"100"; // int(100)
$floatToInt = (int)3.99; // int(3)

var_dump($int, $float, $stringToInt, $floatToInt);
//var_dump(7 % 2 === 0); znajdowanie liczb parzystych 
//var_dump(7 % 2 === 1); lub nieparzystych przy uzyciu modulo

//mathematical operations
var_dump(
    round(3.7), // float(4)
    round(3.4), // float(3)
    floor(3.8), //round down: float(3)
    ceil(3.1), //round up: float(4)
    min(2,3,1,7), // int(1)
    max(2,3,1,7), // int(7)
    rand(1,10), //random number: int(2) 
    abs(-5) //absolute value: int(5)
);

//number formatting
$number = 1234.893334;
echo "Formatted: " . number_format($number, 2, ',', ','); // Formatted: 1,234,89