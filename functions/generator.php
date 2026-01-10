<?php

function countDown(int $start): array
{
    $result = [];
    for($i = $start; $i > 0; $i--){
        echo "Generating number... \n";
        $result[] = random_int(1,100);
    }
    return $result;
}

foreach(countDown(5) as $number){
    echo "Echoing number... \n";
    echo "$number\n";
}

/*
output:
Generating number... 
Generating number...
Generating number...
Generating number...
Generating number...
Echoing number...
97
Echoing number...
79
Echoing number...
13
Echoing number...
84
Echoing number...
47
*/

//generator function - without return keyword, function would return something every single time when we call yield
//we dont need to wait for the whole array to be created, so we save memory!!!
function countDown2(int $start): Generator
{
    for($i = $start;$i > 0; $i--){
        echo "Generating number... \n";
        yield random_int(1,100);
    }
}

foreach(countDown2(5) as $number) {
    echo "Echoing number...\n";
    echo "$number\n";
}
/*
output:
Generating number...
Echoing number...
61
Generating number...
Echoing number...
94
Generating number...
Echoing number...
76
Generating number...
Echoing number...
48
Generating number...
Echoing number...
9
*/