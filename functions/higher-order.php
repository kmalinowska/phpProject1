<?php

$users = [
    ['id' => 1, 'name' => 'Alice', 'role' => 'admin'],
    ['id' => 2, 'name' => 'Bob', 'role' => 'user'],
    ['id' => 3, 'name' => 'Charlie', 'role' => 'user'],
];

//create generic higher-order function to filter for a different properties
//function return other function
function createFilter($key, $value) {
    return fn($item) => $item[$key] === $value;
}

//create function isAdmin
//functions can be :
//passed around as arguments/przekazana jako argument, 
//returned from functions /zwracana z funkcji
//or assigned to variables /przypisana do zmiennej
$isAdmin = createFilter('role', 'admin'); //określenie filtru, którym rola będzie słowem kluczowym 'admin'
$isBob = createFilter('name', 'Bob');

$admins = array_filter($users, $isAdmin);
var_dump($admins);
/* output:
array(1) {
  [0]=>
  array(3) {
    ["id"]=>
    int(1)
    ["name"]=>
    string(5) "Alice"
    ["role"]=>
    string(5) "admin"
  }
}
  */
var_dump(array_filter($users, $isBob));