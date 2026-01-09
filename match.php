<?php

$status = 404;

//"600" !== 600 no type coersion in match statement
// match >= 8.0 version PHP
$message = match ($status) {
    200, 300 => 'Success',
    400, 404, 500 => 'Error',
    default => 'Unknown status'
};

echo $message . "\n";