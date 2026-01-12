<?php
$simpleArray = [1,2,3,4,5];
$associativeArray = [
    'name' => 'John',
    'age' => 30,
    'city' => 'New York'
];

echo $simpleArray[0] . "\n"; // 1
echo $associativeArray['name'] . "\n"; // John

//add element to array
$simpleArray[] = 6;
$associativeArray['country'] = 'USA';

//wyświetlenie tabel po dodaniu elementu
var_dump($simpleArray);
var_dump($associativeArray);

$matrix = [
    [1,2,3],
    [4,5,6]
];
echo $matrix[1][1]; // 5

$fruits = ['apple', 'banana', 'orange'];
var_dump(count($fruits)); // counting array elements: int(3)

//sorting - nie tworzy nowej tabeli, modyfikuje oryginalną
sort($fruits); //ascending sort
var_dump($fruits);
/*
array(3) {
  [0]=>
  string(5) "apple"
  [1]=>
  string(6) "banana"
  [2]=>
  string(6) "orange"
}
*/
rsort($fruits); //descending sort
var_dump($fruits);
/*
array(3) {
  [0]=>
  string(6) "orange"
  [1]=>
  string(6) "banana"
  [2]=>
  string(5) "apple"
}
*/

var_dump($associativeArray);
//sort elements by kye or value
asort($associativeArray); //by value
var_dump($associativeArray);
ksort($associativeArray); // sort by keys alfabeticaly
var_dump($associativeArray);

$numbers = range(1,5);
var_dump($numbers);
/*
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
*/
$squared = array_map(
    fn($n) => $n ** 2, $numbers
);
var_dump($squared);
/*
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

//array filter , tworzy nową tabelę, tak jak i array map
$evenNumbers = array_filter(
    $numbers, 
    fn($n)=> $n % 2 == 0
);
var_dump($evenNumbers);
/*
array(2) {
  [1]=>
  int(2)
  [3]=>
  int(4)
}
  */

//array reduce/redukcja function to 1 single value
$sum = array_reduce(
    $numbers, 
    fn($carry, $n) => $carry + $n, 
    0
);
var_dump($sum); // int(15)

//array unpacking '...' - move all elements from array here
$moreNumbers = [0, ...$numbers, 6];
var_dump($moreNumbers);
/*
array(7) {
  [0]=>
  int(0)
  [1]=>
  int(1)
  [2]=>
  int(2)
  [3]=>
  int(3)
  [4]=>
  int(4)
  [5]=>
  int(5)
  [6]=>
  int(6)
}
*/

//array destructuring
[$first, , $second] = $fruits;
var_dump($first, $second);
//string(6) "orange" 1st element
//string(5) "apple" 3rd element

//calculate the intersection of two arrays //przecięcie dwóch tablic
$set1 = [1,2,3,4,5];
$set2 = [3,4,5,6,7];

var_dump(
    array_intersect($set1, $set2),
    array_intersect($set2, $set1),
    array_diff($set1, $set2), //function used to find the differences - all elements present in set1 but not present in set2
    array_diff($set2, $set1)
);

//get all the keys and all the values of a specific associative array - produce new arrray
$keys = array_keys($associativeArray);
$values = array_values($associativeArray);
var_dump($keys, $values);

// uporządkowana tabela pod nagłówki, gdzie 1 litera jest wielka
$keys = array_map(
    fn($key) => ucfirst($key), array_keys($associativeArray)
);  

//check if key exists
var_dump(
    array_key_exists('name',
    $associativeArray),  // bool(true)
    in_array('John', $associativeArray) // bool(true)
);

//convert array to string, and string to array
$fruitString = implode(', ', $fruits);
$backToArray = explode(', ', $friutString);
var_dump($friutString, $backToArray);

//merge the arrays
var_dump(
    array_merge($set1, $set2),
    $associativeArray,
    array_merge($associativeArray, ['country' => 'DE'])
);
// original keys from first array will be overwritten if they are present in the second array!!!!
var_dump(
    array_unique(array_merge($set1, $set2))
); //powstanie tabela bez zdublowanych wartości!!! 

//jeśli chcemy tylko część tabeli, uzyjemy array_slice:
var_dump(
  array_slice($set1, 1, 3)  
);
/* 1 - starting index
3 - amount of elements
output:
array(3) {
  [0]=>
  int(2)
  [1]=>
  int(3)
  [2]=>
  int(4)
}
*/

//find something in array, ex. index of an element, use array_search
var_dump(
    array_search('banana', $fruits)
); // int(1) ; index 1