<?php
declare(strict_types=1);

//define alternative types by '|' sign
function processInput(int|float|string $input){
    return match(true) {
        is_int($input) => "Intiger: " . ($input * 2),
        is_float($input) => "Float: " . round($input,2),
        is_string($input) => "String: " . strtoupper($input),
        default => "Unknown type"
    };
}

$inputs = [42, 3.14, "hello", 7, 2.834, "world"];
foreach($inputs as $input) {
    echo processInput($input) . "\n";
}
/* output:
Intiger: 84
Float: 3.14
String: HELLO
Intiger: 14
Float: 2.83
String: WORLD
*/