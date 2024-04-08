<?php
/* prüft ein passwort auf gewisse regeln und gibt bei Fehlern ein fehler array zurück
 * 
 * @return array - die fehler
 */
function check_password( $password ){
    $errors = array();

    // wenn die Konstante fehlt, standardwert setzen
    $minLength = defined('PASSWORD_MINLENGTH') ? PASSWORD_MINLENGTH : 8;
    $minLower = defined('PASSWORD_MINLOWER') ? PASSWORD_MINLOWER : 1;
    $minUpper = defined('PASSWORD_MINUPPER') ? PASSWORD_MINUPPER : 1;
    $minSpecial = defined('PASSWORD_MINSPECIAL') ? PASSWORD_MINSPECIAL : 1;


    // Suchmuster (testen: https://regex101.com)
    $patternLower = "#([a-z])#"; // kleinbuchstaben finden
    $patternUpper = "#([A-Z])#"; // grossbuchstaben finden
    $patternSpecial = "#^(.*)([^a-zA-Z0-9\s])(.*)#"; // Sonderzeichen finden

    if( !empty($password) ){
    
        // Länge überprüfen: 
        if( strlen($password)<$minLength ){
            $errors[] = "Passwort muss mindestens $minLength Zeichen enthalten";
        }
        // Keine Leerzeichen
        if( strpos( $password, " " ) !== false ){
            $errors[] = "Passwort darf keine Leerzeichen enthalten";
        }
        
        // Kleinbuchstaben überprüfen: 
        preg_match_all($patternLower, $password, $matchesLower);
        $foundLower = count($matchesLower[0]);
        if( $foundLower < $minLower ){
            $errors[] = "Passwort muss mindestens $minLower Kleinbuchstaben enthalten";
        }
        // Grossbuchstaben überprüfen:
        preg_match_all($patternUpper, $password, $matchesUpper);
        $foundUpper = count($matchesUpper[0]);
        if( $foundUpper < $minUpper ){
            $errors[] = "Passwort muss mindestens $minUpper Grossbuchstaben enthalten";
        }
        // Sonderzeichen überprüfen:
        preg_match_all($patternSpecial, $password, $matchesSpecial);
        $foundSpecial = count($matchesSpecial[0]);
        if( $foundSpecial < $minSpecial ){
            $errors[] = "Passwort muss mindestens $minSpecial Sonderzeichen enthalten";
        }

    }

    return $errors;

}

?>