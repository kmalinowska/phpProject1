<?php

//interfejsy/kontrakty definiują metody, nigdy ich nie implementują!
//poniższy interfejs mówi nam o tym, iż każda klasa która chce byc procesorem płatności musi mieć 2 metody: processPayment() i refundPayment() - wymóg!
//example: Payment processors PayPal, Stripe, Card etc.
interface PaymentProcessor {
    public function processPayment(float | int $amount):bool;  //union type - more than one possible type: 'float | int' pipe operator
    public function refundPayment(float | int $amount):bool;
}

//ABSTRACT CLASS - KLASA ABSTRAKCYJNA
//klasa zawierająca conajmniej 1 abstrakcyjną/niezaimplementowaną metodę 
//kiedy klasa jest abstrakcyjna nie można utworzyć instancji takiej klasy!: $c = new StripeProcessor(); //fatal error!
//implementacja pewnych wspólnych funkcjonalności dla wszystkich operatorów płatności
//implementuje interfejs ale sama nie może być bezpośrednio użyta - szablon zasad dla Stripe i PayPal
abstract class OnlinePaymentProcessor implements PaymentProcessor {
    public function __construct(
        protected readonly string $apiKey
        //'protected' keyword - pola i metody nie sa dostępne poza klasę, ale sa dostępne w klasach, które rozszerzając tę klasę posiadającą te metody
    ) {} //konstruktor mówi nam iż każdy procesor online musi mieć klucz API
    //readonly keyword - używane jeśli chcemy property tylko do odczytu, bez możliwości jej modyfikacji po inicjalizacji

    abstract protected function validateApiKey(): bool;
    abstract protected function executePayment(float | int $amount):bool;
    abstract protected function executeRefund(float | int $amount):bool;
    //rozszerzając/extand i dziedzicząc/inherit klasę abstrakcyjną, trzeba nadpisać te metody i faktycznie je zaimplementować!!!

    //SZABLON DZIAŁANIA/TEMPLATE METHOD PATTERN
    //najpierw sprawdź klucz API, potem wykonaj prawdziwą płatność
    //jak dokładnie wykonać płatność, zależy od Stripe/PayPal
    public function processPayment(float |int $amount):bool {
        if(!$this->validateApiKey()) {
            throw new Exception("Invalid API key");
        }
        return $this->executePayment($amount);
    }
    public function refundPayment(float | int $amount):bool {
        if(!$this->validateApiKey()) {
            throw new Exception("Invalid API key");
        }
        return $this->executeRefund($amount);
    }
}

//IMPLEMENTACJA DZIEDZICZONA, WALIDACJA API, PŁATNOŚĆ
//extends - rozszerzenie procesów płatności online, implementacha pośrednia interfejsu
final class StripeProcessor extends OnlinePaymentProcessor { //final keyword means that you can't extand this class!!!!
    protected function validateApiKey(): bool{
        return strpos($this->apiKey, 'sk_') === 0;
    }

    protected function executePayment(float | int $amount): bool
    {
        echo "Processing Stripe payment of $amount\n";
        return true;
    }

    protected function executeRefund(float | int $amount): bool
    {
        echo "Processing Stripe refund of $amount\n";
        return true;
    }
}

final class PayPalProcessor extends OnlinePaymentProcessor {
    protected function validateApiKey(): bool{
        return strlen($this->apiKey) === 32;
    }

    protected function executePayment(float | int $amount): bool
    {
        echo "Processing PayPal payment of $amount\n";
        return true;
    }

    protected function executeRefund(float | int $amount): bool
    {
        echo "Processing PayPal refund of $amount\n";
        return true;
    }
}

//INNY TYP PŁATNOŚCI: 
//- nie dziedziczy po klasie abstrakcyjnej, 
//- gotówka nie ma API, nie ma walidacji klucza, 
//- po prostu implementuje interfejs
class CashPaymentProcessor implements PaymentProcessor {
    public function processPayment(float | int $amount): bool
    {
        echo "Cash payment ...";
        return true;
    }
    public function refundPayment(float | int $amount): bool
    {
        echo "Cash refund ...";
        return true;
    }
}

//klasa OrderProcessor - odpowiedzialna za przetwarzanie niektórych zamówień użytkowników
//proces zamówień nie jest ściśle powiązany z żadną konkretną metodą płatności
//otrzymujemy dodatkowo RUNTIME POLIMORHISM / polimorfizm w czasie wykonywania - możemy zmienić proces płatności w czasie wykonywania, nie musi być on predefiniowany
//COMPOSITION - przekazywanie obiektu przez konstruktor - wielu developerów preferuje kompozycję od /over dziedziczenia/inheritence
//jeśli chcemy rozszerzać klasę która już istnieje to jest to najlepszy wzorzec!!!
//LOOSE COUPLING/ luźne powiązanie - obiekty implementuja interfejsy, co daje znacznie więcej korzyści, jak łatwiejsze testowanie
class OrderProcessor {
    public function __construct(private PaymentProcessor $paymentProcessor) {}

    public function processOrder(float | int $amount, string | array $items):void {
        if(is_array($items)) {
            $itemsList = implode(', ', $items);
        } else {
            $itemsList = $items;
        }

        echo "Processing order for items: $itemsList\n";

        if($this->paymentProcessor->processPayment($amount)) {
            echo "Order processed successfully\n";
        } else {
            echo "Order processing failed\n";
        }
    }

    public function refundOrder(float | int $amount):void {
        // ...
        if($this->paymentProcessor->refundPayment($amount)) {
            echo "Order refunded successfully\n";
        } else {
            echo "Order refund failed\n";
        }
    }
}

//TWORZENIE OBIEKTÓW
$stripeProcessor = new StripeProcessor("sk_test_123456");
$paypalProcessor = new PayPalProcessor("valid_paypal_api_key_32charslong");
$cashProcessor = new CashPaymentProcessor();

$stripeOrder = new OrderProcessor($stripeProcessor);
$paypalOrder = new OrderProcessor($paypalProcessor);
$cashOrder = new OrderProcessor($cashProcessor);

//WYWOŁANIA
$stripeOrder->processOrder(100.00, "Book");
$paypalOrder->processOrder(150.00, ["Book", "Movie"]);
$cashOrder->processOrder(50.00, ["Apple", "Orange"]);

$stripeOrder->refundOrder(25.00);
$paypalOrder->refundOrder(50.00);
$cashOrder->refundOrder(10.00);