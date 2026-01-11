<?php

//search text in php
//"haystack" name of variable often used for the string we are going to be searching in
$haystack = "The quick brown fox";
$pos = strpos($haystack, "quick"); //strpos() function - use for get a position of a specific substring in a haystack
var_dump($pos); // output: int(4)

//replace text
var_dump(str_replace("quick", "lazy", $haystack)); // output: string(18) "The lazy brown fox"

//regular expresions /.../, using pattern/wzorca
//preg_match_all() funkcja szukająca wszystkich pasujących fragmentów do wzorca
//'/\w{5}/' wzorzec (dokładnie 5 znaków typu litera/cyfra/_ pod rząd); $matches - tablica do której trafią znalezione dopasowania
preg_match_all('/\w{5}/', $haystack, $matches);
var_dump($matches);
/*
output:
array(1) {
  [0]=>
  array(2) {
    [0]=>
    string(5) "quick"
    [1]=>
    string(5) "brown"
  }
}
*/