<?php

//define boilerplate/szablon by using classes, 
//and then create objects based on those boilerplates
//Class -> Tesla Y
//Object -> My Tesla Y or your Tesla Y
// classes have data(variables) or methods(functions)

class Person {
    /*
    public string $name;
    public int $age;

    //initialize properties by using constructor method
    public function __construct(string $name, int $age){
        $this->name = $name;
        $this->age = $age;
    }
    */

    //constructor property promotion!!!
    //zamiast tego co wyżej możemy to zapisać inaczej, prościej:
    public function __construct(
        public string $name, public int $age 
    ) {}
    //zarówno utworzy to zmienne jak i je zainicjuje :)

    public function introduce():
    string {
        return "Hi, I'm {$this->name} and I'm {$this->age} years old.\n";
    }
}

$person = new Person("Alice", 30);
echo $person->introduce(); // output: Hi, I'm Alice and I'm 30 years old.
$person2 = new Person("Piotr", 37);
echo $person2->introduce();