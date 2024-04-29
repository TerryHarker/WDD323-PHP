<?php
/**
 * Verbindet mit einer MySQL-Datenbank 
 */
function db_connect(){
    echo 'db_connect ausgeführt';
    try {
        // PDO Objekt mit verbindung erstellen
        $db = new PDO('mysql:host='.DBSERVER.';dbname='.DBNAME, DBUSER, DBPASSWORT); // xampp leer, mampp 'root'
        // var_dump($db);
        return $db;
    } catch ( Exception $exception ){
        // Abbruch, wenn die DB Verbindung nicht klappt
        die( 'MySQL Verbindungsfehler: '.$exception->getMessage() );
    }
}

?>