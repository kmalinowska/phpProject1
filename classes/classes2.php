<?php

//class inheritance/dziedziczenie 
class Person {
    public function __construct(
        public string $name, public int $age 
    ) {}

    public function introduce(): string {
        return "Hi, I'm {$this->name} and I'm {$this->age} years old.";
    }
}

class Employee extends Person {
    public function __construct(
        public string $name, 
        public int $age,
        public string $position
    ) {}

    // overwrite method from parents class, redefine the method:
    //we must use parent::introduce() to call the parent function
    public function introduce(): string {
        return parent::introduce() . " I work as a {$this->position}.";
    }
}

$employee = new Employee("Jerry", 45, "Manager");
echo $employee->introduce() . "\n"; // output: Hi, I'm Jerry and I'm 45 years old. I work as a Manager.

// class polymorphism/polimorfizm
$people = [
    new Employee("Jerry", 45, "Manager"),
    new Person("Piotr", 37)
];

//if we have common parent class/wspólną klasę nadrzędną 
//we can treat obcjects of different classes as if they are the same parent class
function introduce(Person $person) {
    echo $person->introduce() . "\n"; 
}

foreach ($people as $person) {
    introduce($person);
}
