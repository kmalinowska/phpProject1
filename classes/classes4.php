<?php

//static properties and methods /właściwości i metody statyczne
class MathUtils {
    public static float $pi = 3.14159;

    public static function square(float $num):float{
        return $num * $num;
    }
}

//how call the static methods and get access to static fields?
var_dump(
    MathUtils::$pi, // float(3.14159)
    MathUtils::square(4) //float(16)
);

/*Singleton Software Design Pattern 
- określona klasa powinna być utworzona tylko raz
i nie powinno być możliwe jej ponowne utworzenie
- aby zaoszczędzić kosztowne zasoby, 
np. podczas tworzenia połączenia z bazą danych
*/
class Connection {
    private static $instance = null;
    private function __constructor() {}

    public static function singleton() {
        if(null === Connection::$instance) {
            Connection::$instance = new Connection();
        }
        return Connection::$instance;
    }
}

$connection = Connection::singleton();

/* LATE STATIC BINDING // późne wiązanie statyczne
zamiast polegac bezpośrednio na nazwie klasy wewnątrz klasy 
możemy użyć słowa kluczowego 'static'
*/
class Connection2 {
    private static $instance = null;
    private function __constructor() {}

    public static function singleton() {
        if(null === static::$instance) {
            static::$instance = new static();
        }
        return static::$instance;
    }
}