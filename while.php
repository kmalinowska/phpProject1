<?php

$secret = "magic";
$attempts = 0;
$maxAttemps = 5;

while($attempts < $maxAttemps) {
    echo "Guess the password: ";
    $guess = trim(fgets(STDIN));
    $attempts++;

    if($guess == $secret) {
        echo "Correct! Ypu've unlocked a treasue!\n";
        break;
    } elseif ($attempts == $maxAttemps) {
        echo "Out of atttempts! The treasure remains locked. \n";
    } else {
        echo "Wrong! try again. Attempts left: " . ($maxAttemps - $attempts) . "\n";
    }
}