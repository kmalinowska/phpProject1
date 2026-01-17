<!-- 
 FORMS/formularze, 
 - form submision - przesyłanie formularza 
 - domyślne zachowanie formularzy polega na przesyłaniu ich do bieżącego adresu URL: <form action="/">  możemy to pominąć!
 - domyślna metoda formularza/żądanie to GET, my zmieniamy ja na POST: <form method="POST">
-->
 <?php
 // jesli strona jest zażądana za pomocą metody POST, oczekujemy, że dane zostaną wysłane i obsłużą formularz
    if($_SERVER['REQUEST_METHOD']==='POST') {
        //var_dump($_POST); //zawiera wszystkie dane przesłane za pomocą żądania POST, czyli wszystkie dane formularza
        //za każdym razem gdy uzytkownicy przesyłają dane musimy je sanitize, musimy mieć pewność że dane są bezpieczne
        //dlatego przed wprowadzeniem ich do bazy danych, musimy sprawdzić ich poprawność - validate data
        //ale też uciec od danych, aby miec pewność, że nikt nie będzie próbował wysyłać zapytań SQL, które można przypadkowo uruchomić w swojej bazie danych
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL); //email validation, check if it is correct
        echo "The email $email was submitted!";
        die;
    }
 ?>
 <html>
<body>
    <h1>Please submit the form</h1>
    <form method="POST">
        <label>Email:</label> <!-- element etykiety <label> - można jej uzyć do wskazania iż oczekujemy wiadomości email -->
        <input type="email" name="email" /> <!-- dodanie pola typu email, który jest nowym, prawidłowych typem pola, nadanie mu nazwy email-->
        <button>Submit</button> <!-- przycisk mówiący 'Wyślij' -->
    </form>
</body>
 </html>