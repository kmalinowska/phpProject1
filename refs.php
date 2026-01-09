<?php

$person = "John";
$client = &$person; //the variables have the same space in memory so the values are the same when we used reference

var_dump($person, $client); // output: "John" "John"

$client = "Robert";

var_dump($person, $client); // output: "Robert" "Robert"

$person = "Harry";

var_dump($person, $client); // // output: "Harry" "Harry"