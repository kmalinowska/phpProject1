<?php

$greet = function ($name) {
    return "Hello, $name\n";
};

echo $greet("David");

$numbers = [1,2,3];
$squared = array_map(function($n) {
    return $n * $n;
}, $numbers);

var_dump($numbers, $squared);

$message = "Bye";
//use ($message) - use when we want to have access to a outside variables, it is a copy exist only in this function
$greet2 = function ($name) use ($message) {
    $message = $message . "!\n";
    return "$message, $name\n"; // output: Bye!, David
};

echo $greet2("David");
echo $message . "\n"; // output: Bye

//if we want to change message value, we must use reference:
//$greet2 = function ($name) use (&$message) {...}
// then: echo $message . "\n"; // output: Bye!
