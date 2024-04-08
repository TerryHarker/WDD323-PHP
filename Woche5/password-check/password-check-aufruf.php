<?php
/*
 * Das ist das Skript, welches die funktionen aufrufen soll
 */
require_once( 'config.php' );
require_once( 'functions.php' ); // Funktionen einbinden




$fehlerarray = check_password( 'test1234' );
echo '<pre>test1234: ';
print_r($fehlerarray);
echo '</pre>';

$fehlerarray = check_password( 'Kuckuck!2024' );
echo '<pre>Kuckuck!2024: ';
print_r($fehlerarray);
echo '</pre>';

$fehlerarray = check_password( 'ZUGROSS' );
echo '<pre>ZUGROSS: ';
print_r($fehlerarray);
echo '</pre>';

?>