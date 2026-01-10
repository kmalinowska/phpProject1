<?php

$largeArray = range(1, 1_000_000); //array with 1 mln elements
$startTime = microtime(true);
$startMemory = memory_get_usage();


$out = [];

foreach($largeArray as $value) { 
    $out[] = $value * 2;
}

/*
don't need this too: $out = [];

foreach($largeArray as &$value) { 
    $value = $value * 2;
}
    */

$endTime = microtime(true);
$endMemory = memory_get_usage();

echo "Time: " . ($endTime - $startTime) . " seconds\n";
echo "Memory: " . round(($endMemory - $startMemory) /1024/1024) . " MBs\n";