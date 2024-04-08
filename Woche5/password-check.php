<?php 
$errors = array();

// Passwortregeln: 
$minLength = 8;
$minUpper = 1; 
$minLower = 1; 
$minSpecial = 1;

// Suchmuster (testen: https://regex101.com)
$patternLower = "#([a-z])#"; // kleinbuchstaben finden
$patternUpper = "#([A-Z])#"; // grossbuchstaben finden
$patternSpecial = "#^(.*)([^a-zA-Z0-9\s])(.*)#"; // Sonderzeichen finden

if( !empty($_POST['password']) ){
  
  // Länge überprüfen: 
  if( strlen($_POST['password'])<$minLength ){
    $errors[] = "Passwort muss mindestens $minLength Zeichen enthalten";
  }
  // Keine Leerzeichen
  if( strpos( $_POST['password'], " " ) !== false ){
    $errors[] = "Passwort darf keine Leerzeichen enthalten";
  }
  
  // Kleinbuchstaben überprüfen: 
  preg_match_all($patternLower, $_POST['password'], $matchesLower);
  $foundLower = count($matchesLower[0]);
  if( $foundLower < $minLower ){
    $errors[] = "Passwort muss mindestens $minLower Kleinbuchstaben enthalten";
  }
  // Grossbuchstaben überprüfen:
  preg_match_all($patternUpper, $_POST['password'], $matchesUpper);
  $foundUpper = count($matchesUpper[0]);
  if( $foundUpper < $minUpper ){
    $errors[] = "Passwort muss mindestens $minUpper Grossbuchstaben enthalten";
  }
  // Sonderzeichen überprüfen:
  preg_match_all($patternSpecial, $_POST['password'], $matchesSpecial);
  $foundSpecial = count($matchesSpecial[0]);
  if( $foundSpecial < $minSpecial ){
    $errors[] = "Passwort muss mindestens $minSpecial Sonderzeichen enthalten";
  }

}

echo count($errors) ? implode('<br>', $errors) : 'Aller gut!';
?>