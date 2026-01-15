<?php
//TRAITS/cechy
//jeśli rejestrowalibyśmy coś z wielu różnych klas, trzeba byłoby implementować tę samą metodę rejestrowania za każdym razem
//rozwiązaniem jest użycie traitsów - zestaw metod, które możemy dodać do klasy - bez dziedziczenia
interface Logger {
    public function log(string $message):void;
}

trait Loggable {
    public function log(string $message):void {
        echo "Logging: $message\n";
    }
}

class User // implements Logger  - możemy utworzyć klasę bez tego używając traitsów
{
    use Loggable; //użycie traits
    public function __construct(public string $name) {}

    public function save():void {
        $this->log("User {$this->name} saved"); 
        //logging - recording of events, actions or data points
        //aby użyć funkcji log w klasie User możemy użyć kompozycji - uzycie innego obiektu bez klasy
        //możemy przekazać jakąs logger class posiadającą implementację logger interface, przez co łatwo moglibyśmy przełączać się między loggerami/rejestratorami
        //albo przekazać obiekt przez konstruktor $this->logger->log("User {$this->name} saved"); 
        //inny sposób to właśnie użycie cechy/trait

    }
}

//możemy stworzyć instancję klasy User
$user = new User("Piotr");
$user->save(); // Logging: User Piotr saved
