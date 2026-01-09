<?php

function sum(...$numbers) {
    $sum = 0;
    var_dump($numbers);
    foreach($numbers as $number) {
        $sum += $number;
    }
    return $sum;
}

var_dump(sum());
var_dump(sum(5));
var_dump(sum(5, 10, 15, 20, 25));

function introduceTeam($teamName, ...$members) {
    echo "Team: $teamName\n";
    var_dump($members);
    echo "Members: " . implode(", ", $members) . "\n";
}

introduceTeam("A team", "John", "Mr T");