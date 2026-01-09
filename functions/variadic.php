<?php

declare(strict_types=1);

function sum(int ...$numbers):int {
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

//this funcion don't return anything, we should use :void
function introduceTeam(string $teamName, string ...$members):void {
    echo "Team: $teamName\n";
    var_dump($members);
    echo "Members: " . implode(", ", $members) . "\n";
}

introduceTeam("A team", "John", "Mr T");