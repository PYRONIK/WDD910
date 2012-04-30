<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);


// require('class/pkw.class.php');

function __autoload($class){
	require('class/'.$class.'.class.php');
}

$myauto =  new pkw('blau');

$myauto2 = new sportwagen('rot');

$myauto -> bremsen();

echo "<hr />";

$myauto2 ->bremsen();
?>

