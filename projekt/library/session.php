<?php

/**
 * Schreibt Werte in die Session
 * @return bool - true wenn die Session geschrieben werden konnte, false wenn keine Session gefunden wurde
 */
function create_usersession(){
    if(!isset($_SESSION)){
        return false; // keine Session verfügbar
    }
    $_SESSION['isloggedin'] = true; // login status
    $_SESSION['userip'] = $_SERVER['REMOTE_ADDR']; // IP Speichern für prüfung
    $_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT']; // IP Speichern für prüfung
    $_SESSION['timestamp'] = time(); // Timestamp für Zeiteinschränkung

    return true;
}

/**
 * Prüft die User session
 * @return bool loginstatus - true wenn der User eine gültige Usersession hat, false wenn er nicht eingeloggt ist oder zu lange inaktiv war
 */
function check_usersession(){
    $isLoggedIn = false;

    // Prüfen
    if( isset($_SESSION['isloggedin']) &&  $_SESSION['isloggedin'] === true){
        // user ist eingeloggt
        $isLoggedIn = true;
        $session_lifetime = SESSION_LIFETIME * 60;
        
        // IP Prüfen - gespeicherte IP mit aktueller IP vergleichen
        if( $_SESSION['userip'] != $_SERVER['REMOTE_ADDR'] ){
            $isLoggedIn = false;
        }

        // User Agent Prüfen  - gespeicherte User Agent mit aktuellem vergleichen
        if( $_SESSION['useragent'] != $_SERVER['HTTP_USER_AGENT']){
            $isLoggedIn = false;
        }

        // Zeit einschränken:
        $zeitjetzt = time(); // Vergangene Sekunden seit letzter Aktivität / letztem Page load
        if( $zeitjetzt-$_SESSION['timestamp'] > $session_lifetime ){
            $isLoggedIn = false; // Zu lange inaktiv
        }
    }

    if($isLoggedIn == false){
        delete_usersession(); // session zurücksetzen (force logout)
    }else{
        session_regenerate_id(); // Session ID erneuern - gegen Session Hijacking
        $_SESSION['timestamp'] = time(); // keep alive: timestamp erneuern bei jedem page load (NACH allen Überprüfungungen!)
    }

    return $isLoggedIn;
}

/**
 * Beendet die User Session (Logout funktion)
 */
function delete_usersession(){
    // Session zurücketzen, indem die gespeicherten Informationen gelöscht werden - logout:
    unset( $_SESSION['isloggedin'] );
    unset( $_SESSION['userip'] );
    unset( $_SESSION['useragent'] );
    unset( $_SESSION['timestamp'] );
}

?>