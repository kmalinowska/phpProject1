<?php
declare(strict_types=1);

$abc = null;
$db = $abc ?? "default"; //$abc is assigned to $db, if $abc is not null, but if it is then it will be assigned as "default" / ?? - null coalescing operator

var_dump(
    null == null, // output: bool(true)
    null == false, // output: bool(true)
    null == 0, // output: bool(true)
    null == '', // output: bool(true)
    null == [], // output: bool(true)
    $abc, //output: NULL - it is nothing to be returned
    isset($dca), // output: bool(false) - isset function, check if certain value is defined, it is not so return false
    isset($abc), // output: bool(false) - important!!!  even if we define that higher it is not exist because value is null!! 
    is_null($abc), //output: bool(true) - it is null!
    $db, //output: string(7) "default"
    empty([]) // output: bool(true), empty() function check if it is empty
);

function greet(?string $name) { // when we use ? it can be null value!!
    //echo "Hello, " . $name  . "!\n"; //output will be: "Hello, "
    echo "Hello, " . ($name ?? "stranger") . "!\n";
}

greet("Alice"); // output: "Hello, Alice!"
greet(null); // output: "Hello, stranger!"

//remove elements from array when they are equal to null
var_dump(
    array_filter([1, null, "", []. 3])
); 
/* output:
array(2) {
  [0]=>
  int(1)
  [3]=>
  string(6) "Array3"
  */