<?php

//global scope and variables
$superhero = "Superman";

//local scope function revealIdentity
function revealIdentity() {
    global $superhero; // global statement to have access to global scope variables, rather don't use it like that, use arguments!!!
    $message = "real name is Clark Kent\n";
    //$superhero = 'Spiderman"; - we can modify here global variable, and we rather don't want to be possible here
    echo "$superhero $message";
}

//echo $message; - error, $message is local variable

revealIdentity(); //output: "Superhero real name is Clark Kent"

//static variable - preserves/zachowuje the state/stan of a variable defined in the function
// zmienna ta jest współdzielona przez wszystkie wywołania funkcji
function countVisitors() {
    static $visitorCount = 0;
    $visitorCount++;
    echo "Visitor #$visitorCount has arrived\n";
}

countVisitors(); //output: "Visitor #1 has arrived"
countVisitors(); //output: "Visitor #2 has arrived"
countVisitors(); //output: "Visitor #3 has arrived"

// static variable in function is useful when we for example keep the reference of database connection
/*
function getDb(){
    static $db;

    if($db === null){
        $db = connect();
    }

    return $db;
}
*/