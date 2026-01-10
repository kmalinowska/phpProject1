<?php

$numbers = [1,2,3,4,5];
$multiplier = 3;

//normal function
$squared = array_map(function ($n){
    return $n * $n;
}, $numbers);

//arrow function, sigle expression
$squared2 = array_map(
    fn ($n) => $n * $n,
    $numbers
);

//we can use outside variables with arrow function!!!!:
$squared3 = array_map(
    fn ($n) => $n * $multiplier,
    $numbers
);

var_dump($numbers, $squared, $squared2. $squared3);
/* output:
array(5) {
  [0]=>
  int(1)
  [1]=>
  int(2)
  [2]=>
  int(3)
  [3]=>
  int(4)
  [4]=>
  int(5)
}
array(5) {
  [0]=>
  int(1)
  [1]=>
  int(4)
  [2]=>
  int(9)
  [3]=>
  int(16)
  [4]=>
  int(25)
}
  array(5) {
  [0]=>
  int(1)
  [1]=>
  int(4)
  [2]=>
  int(9)
  [3]=>
  int(16)
  [4]=>
  int(25)
}
  array(5) {
  [0]=>
  int(1)
  [1]=>
  int(4)
  [2]=>
  int(9)
  [3]=>
  int(16)
  [4]=>
  int(25)
}
*/