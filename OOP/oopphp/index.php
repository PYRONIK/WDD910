<?php
/* Anzeige aller Fehlermeldungen aktivieren */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);


// require('class/pkw.class.php');

/* __autoload wird bei jeder Instanzierung aufgerufen */
function __autoload($class){
	require('class/'.$class.'.class.php');
}

// neuen roten pkw erstellen
$myauto =  new sportwagen('blau');

// Sportwagen-Instanz bilden
$myauto2 = new sportwagen('rot');


// pkw bremst
echo $myauto -> bremsen(90) -> lenken()
   		-> bremsen(15) -> bremsen(1)
		-> lenken()->getFarbe();

echo "<hr />";

// sportwagen bremst
$myauto2 ->bremsen()->lenken();
?>

