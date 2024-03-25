<?php
// Auslesen von Daten aus einem GET Formular:
echo '<pre>GET ';
print_r($_GET);
echo '</pre>';

var_dump($_GET['prename']);
echo $_GET['prename'];


// Auslesen von Daten aus einem POST Formular:
echo '<pre>POST ';
print_r($_POST);
echo '</pre>';
?>