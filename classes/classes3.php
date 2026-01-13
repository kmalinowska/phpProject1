<?php

//encapsulation/enkapsulacja in Object-Oriented design/projektowanie obiektowe
class BankAccount {
    private float $balance = 0; //cant access this variable outside that class!!    
    
    //use encapsulation by providing public methods to class
    public function getBalance():float {
        return $this->balance;
    }
    //create methods allow to modify the balance
    //deposit money - wpłata pieniędzy na konto
    public function deposit(float $amount):void { //argument: amount, void: doesnt return any value
        if($amount >0) { //sprawdzamy czy kwota jest większa od 0 - nie chcemy wypłacać wartości ujemnych!
            $this->balance += $amount; // jeśli tak, to możemy dodać kwotę do salda
        }
    }
    //withdraw the money from the account - wypłata pieniędzy z konta
    public function withdraw(float $amount):bool { //bool - mean if it was successful or not
        if($amount > 0 && $this->balance >= $amount){
            $this->balance -= $amount;
            return true;
        } 
        return false;
    }
}

$account = new BankAccount(); //dont need a constructor to create object!!
//echo $account->balance; // fatal error! private property!
var_dump(
    $account->deposit(1000), 
    $account->withdraw(500), 
    $account->getBalance() //float(500)
); 