<?php

$str = "Hello, World!\n";

echo $str[0]; // "H"
echo $str[-1]; // "!"
echo substr($str, 0, 5); // "Hello"
echo substr($str, 5); // ", World!"
echo strtoupper($str); // "HELLO, WORLD!"
echo strtolower($str); // "hello, world!"
echo ucfirst(strtolower($str)); // "Hello, world!"

$greeting = "Hello, " . "World!";
$greeting .= " How are you? \n";
echo $greeting; // "Hello, World! How are you?"
