<?php
//ENUM keyword - define an enum or enumeration
//let create a new type with some fixed set of possible values, provide type safety
enum DaysOfWeek {
    case MONDAY;
    case TUESDAY;
    case WEDNESDAY;
    case THURSDAY;
    case FRIDAY;
    case SATURDAY;
    case SUNDAY;
}

$today = DaysOfWeek::WEDNESDAY; //type: DaydOfWeek, not string or intiger

if($today === DaysOfWeek::WEDNESDAY) {
    echo "It is Wed!\n";
}

enum Colour: string {
    case RED = '#FF0000'; //backing value - defining this optional values
    case GREEN = '#00FF00';
    case BLUE = '#0000FF';
}

echo Colour::RED->value . "\n"; //#FF0000

function isWeekend(DaysOfWeek $day): bool {
    return $day === DaysOfWeek::SATURDAY || $day === DaysOfWeek::SUNDAY;
}

echo isWeekend(DaysOfWeek::MONDAY) ? 'Yes' : 'No'; // No