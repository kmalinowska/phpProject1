<?php

//string formatting and parsing
$name = "Alice";
$age = 30;

//funkcja printf() pozwala na zdefiniowanie ciągu znaków symbolami zastępczymi, 
//tj. %s(ciąg znaków), %d(liczba całkowita)
printf("%s is %d years old.\n", $name, $age); // output: Alice is 30 years old.

//format csv - data export
$csv = "apple, banana, cherry";
$fruits = explode(",", $csv);
//explode() function - pozwala na użycie separatora, tutaj ','
var_dump($fruits); /*output:
array(3) {
  [0]=>
  string(5) "apple"
  [1]=>
  string(7) " banana"
  [2]=>
  string(7) " cherry"
}
*/
var_dump($fruits, implode(", ", $fruits));
//implode() - funckja przeciwna do explode(), 
// użycie separatora i przekazanie tablicy
// przekonwertowanie na ciąg znaków
//output: string(23) "apple,  banana,  cherry"

//string padding/wypełnienie
// użyteczne aby otrzymać pola lub ciągi znaków o stałej długości
$padded = str_pad("Hello", 10, '-', STR_PAD_BOTH);
echo $padded . "\n"; // output: --Hello---

//string trimming/przycinanie 
//use with user imput, to remove unnecessary signs
var_dump(trim("    Hello, World!    \n"));
// output: string(13) "Hello, World!"

