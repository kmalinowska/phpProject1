<?php

$name = "John";
echo 'Hello, $name!\n'; // Hello, $name!\n
echo "Hello, $name!\n"; // Hello, John!

//like string with ""
$heredoc = <<<EOD
Multi-line string
with variable $name \n
EOD;

//like string with ''
$nowdoc = <<<'EOD'
Multi-line string
without variable $name \n
EOD;

echo $heredoc; 
/* 
output:
Multi-line string
with variable John
*/
echo $nowdoc;
/*
output:
Multi-line string
without variable $name \n
*/