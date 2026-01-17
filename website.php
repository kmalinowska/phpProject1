<!--
Jak rozpocząć kompilację PHP na serwerze/PHP build in server?
- plik binarny PHP ma wbudowany serwer WWW, co oznacza że nie potrzebujemy żadnego zewnętrznego serwera WWW do uruchamiania stron internetowych PHP przynajmniej na swoim komputerze 

Super global variables 
- zmienne dostępne wszędzie, tylko do odczytu, nie można nadpisać ich wartości!!
- ich nazwa rozpoczyna sie od podkreślnika/underscore _ : var_dump($_SERVER);
-->

<!--THE LOGIC OF THE PAGE -->
<?php
//define a page title variable
$pageTitle = "Dynamic PHP Page";
$currentTime = date("H:i:s"); //show time including minutes and seconds
?> <!--close php section -->

<!--OUTPUT HTML section -->
<html>
    <head> <!-- body section - display current time value -->
        <title><?= $pageTitle?></title> <!--shorthand syntax/skrócona składnia, dont need a semicolon -->
    </head>
    <body> <!-- body section - display current time value -->
        <h1>Welcome</h1>
        <p>
            The current server time is: <?=$currentTime?>
        </p>
        <table>
            <thead> <!-- table header, contains columns with their titles -->
                <tr> <!-- row -->
                    <td><strong>Key</strong></td> <!-- column-->
                    <td><strong>Value</strong></td> <!-- column -->
                </tr>
            </thead>
            <tbody> <!-- section contains the actual/rzeczywiste elements -->
            <!-- alternative syntax foreach loop: foreach (...):endforeach -->
                <?php foreach($_SERVER as $key => $value): ?>
                    <tr>
                        <td><?=$key?></td>
                        <td><?=$value?></td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </body>
</html>
