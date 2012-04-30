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
$myauto =  new pkw('blau');

// Sportwagen-Instanz bilden
$myauto2 = new sportwagen('rot');


// pkw bremst
$myauto -> bremsen();

echo "<hr />";

// sportwagen bremst
$myauto2 ->bremsen();
?>

