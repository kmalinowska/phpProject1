<?php
/*LICZNIK ODWIEDZIN STRONY DLA BIEŻĄCEGO UŻYTKOWNIKA 
- aby uniknąć podwójnej prośby przy odwiedzeniu strony, która bierze się z tego iż przeglądarka internetowa 
próbuje pobrać ulubiona ikonę naszej witryny, której nie mamy ponieważ mamy tylko jeden plik PHP
używamy super globalnej zmiennej $_SERVER['REQUEST_URI']
- następnie musimy rozpocząć sesję - session_start(); - funkcja ta sprawdza identyfikator sesji
który zapisywany jest w pliku cookie - przy następnym wejściu na strone funkcja ta upewni się 
że pobrana zostanie wartość tego pliku cookie, aby znaleźć identyfikator sesji użytkownika i aby móc go zidentyfikować
- przy każdym żądaniu, przeglądarka wysyła do serwera wszystkie pliki cookies danej domeny za pomocą nagłówków żądania

- musimy śledzić nazwę użytkownika, jeśli ją poda - po rozpocząciu sesji sprawdzamy czy żądanie jest żądaniem typu POST
to mówi nam że ktoś wysłał formularz / submitted the form - uzycie zmiennej super globalnej 'REQUEST_METHOD'
możemy tutaj ustawic plik cookie za pomocą funkcji setcookie();
nadajemy mu nazwę 'user' i pobieramy dane z formularza $_POST['name'], następnie okreslamy datę wygasnięcia na 1h/3600s: time() + 3600, '/'

COOKIES
- przechowywane są w przeglądarce, nie na serwerze, nawet przez długi czas,
- nie są używane do przechowywania danych wrażliwych, jak np. hasła

SESSIONS
- przechowywane na serwerze
- po jakims czasie sesja automatycznie się niszczy, np. po godzinie, przez co jest bezpieczniejsza od cookies
- często wykorzysywane do uwierzytelniania, dzięki czemu można zalogować się do witryny a sesja przechowa informacje o użytkowniku, a po wylogowaniu zniszczy je
*/
if ($_SERVER['REQUEST_URI'] === '/favicon.ico') {
    exit;
}

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    setcookie('user', $_POST['name'], time() + 3600, '/');
}

//sprawdzenie czy specyficzne cookie istnieje poprzez uzycie funkcji isset()
$hasCookie = isset($_COOKIE['user']);
//dzięki cookies uzytkownika rozpoznajemy czy użytkownik wprowadził swoje imię
if (!$hasCookie) {
    $welcomeMessage = "Welcome back, user!";
} else {
    $welcomeMessage = "Welcome back, " . htmlspecialchars($_COOKIE['user']);
}

//musimy przechować liczbę wizyt w danych sesji
if (!isset($_SESSION['visits'])) { //sprawdzenie czy licznik istniejem używając super global
    $_SESSION['visits'] = 1; //jeśli nie istnieje, zainicjowanie licznika pierwszej wizyty
} else {
    $_SESSION['visits']++; //increment counter
}

//wyświetlenie wiadomości
$visitMessage = "This is your " . $_SESSION['visits'] . " visit.";
?> <!-- close php part -->
<html>
<!-- present data to the user in the html part -->
<body>
    <?php if (!$hasCookie): ?> <!-- display to user if not cookie yet -->
        <form method="POST">
            <label>Your name:</label>
            <input type="text" name="name" />
            <button>Track</button>
        </form>
    <?php endif; ?>
    <!-- display to user if cookies exists already: -->
    <p><?= $welcomeMessage ?></p>
    <p><?= $visitMessage ?></p>
</body>
</html>