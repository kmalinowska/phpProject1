<?php

$mb_string = "ʇxǝ⊥ dılℲ"; //unicode text
var_dump(strlen($mb_string)); // output: int(16) - it is not good result of length string
//in this case we should use multibyte version of string functions with prefix mb
var_dump(mb_strlen($mb_string)); // output: int(9)

//url encoding/kodowanie
//aby przekazać string zawierający znaki specjalne musimy je kodować
$url = "https://example.com/path?key=value&special=@#$%";
var_dump(urlencode($url)); 
/* output:
string(71) "https%3A%2F%2Fexample.com%2Fpath%3Fkey%3Dvalue%26special%3D%40%23%24%25"
taki tekst możemy przekazać jako parametr do innego url
*/
var_dump(urldecode(urlencode($url)));
/* output:
string(47) "https://example.com/path?key=value&special=@#$%"
odkodowanie do pierwotnego adresu url
*/

//escaping - pominięcie niektórych znaków specjalnych i znaczników HTML, aby nie były one interpretowane przez przeglądarkę jako znaczniki.
$html = '<p>This is "quoted" text & a <a href="#">link</a>.</p>';
var_dump(htmlentities($html));
/* output:
string(102) "&lt;p&gt;This is &quot;quoted&quot; text &amp; a &lt;a href=&quot;#&quot;&gt;link&lt;/a&gt;.&lt;/p&gt;"
not interpreter as html, safely stored
*/

//base64_encode - reprezentacja danych binarnych przy użyciu zestawu 64 znaków będących literami i cyframi
var_dump(base64_encode("Hello World!")); // output; string(16) "SGVsbG8gV29ybGQh"
//odkodowanie tekstu powyżej:
$encoded = base64_encode("Hello World!");
var_dump(base64_decode($encoded)); // output: string(12) "Hello World!"